package eu.europa.ec.digit.nexus.security.drupal;

import java.util.HashSet;
import java.util.Set;

import org.codehaus.plexus.component.annotations.Component;
import org.codehaus.plexus.component.annotations.Requirement;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.sonatype.security.usermanagement.AbstractReadOnlyUserManager;
import org.sonatype.security.usermanagement.DefaultUser;
import org.sonatype.security.usermanagement.RoleIdentifier;
import org.sonatype.security.usermanagement.User;
import org.sonatype.security.usermanagement.UserManager;
import org.sonatype.security.usermanagement.UserSearchCriteria;
import org.sonatype.security.usermanagement.UserStatus;

import eu.europa.ec.digit.drupal.dao.UserDao;
import eu.europa.ec.digit.drupal.domain.DrupalUser;

@Component(role = UserManager.class, hint = "Drupal", description = "Drupal User Manager")
public class DrupalUserManager extends AbstractReadOnlyUserManager {

    private static Logger logger = LoggerFactory.getLogger(DrupalUserManager.class);

    public static final String SOURCE = "Drupal";

    public String getSource() {
        return SOURCE;
    }

    public String getAuthenticationRealmName() {
        return "Drupal";
    }

    @Requirement(hint = "Drupal")
    private UserDao drupalUserDao;

    @Override
    public User getUser(String userId) {
        logger.debug("DrupalUserManager.getUser " + userId);
        User result = toUser(drupalUserDao.findByUserId(userId));
        logger.debug("" + result);
        return result;
    }

    @Override
    public Set<String> listUserIds() {
        logger.debug("DrupalUserManager.listUserIds");
        Set<String> result = drupalUserDao.findAllUserId();
        logger.debug("" + result);
        return result;
    }

    public Set<User> listUsers() {
        logger.debug("DrupalUserManager.listUsers");
        Set<User> users = new HashSet<User>();

        Set<DrupalUser> drupalUsers = drupalUserDao.findAll();

        for (DrupalUser user : drupalUsers) {
            users.add(toUser(user));
        }

        logger.debug("" + users);
        return users;
    }

    public Set<User> searchUsers(UserSearchCriteria criteria) {
        logger.debug("DrupalUserManager.listUsers");
        Set<User> result = filterListInMemeory(listUsers(), criteria);
        logger.debug("" + result);
        return result;
    }

    private User toUser(DrupalUser drupalUser) {
        logger.debug("DrupalUserManager.toUser");
        if (drupalUser == null) {
            logger.debug("null");
            return null;
        }

        DefaultUser user = new DefaultUser();

        user.setEmailAddress(drupalUser.getMail());
        user.setUserId(drupalUser.getUid());
        user.setFirstName(drupalUser.getFirstname());
        user.setLastName(drupalUser.getLastname());
        user.setStatus(UserStatus.active);
        for (String role : drupalUser.getRoles()) {
            RoleIdentifier roleIdentifier = new RoleIdentifier(getSource(), role);
            user.addRole(roleIdentifier);
        }
        user.setSource(getSource());

        logger.debug("" + user);
        return user;
    }

}
