package eu.europa.ec.digit.nexus.security.drupal;

import java.util.Set;

import org.apache.shiro.authc.AuthenticationException;
import org.apache.shiro.authc.AuthenticationInfo;
import org.apache.shiro.authc.AuthenticationToken;
import org.apache.shiro.authc.SimpleAuthenticationInfo;
import org.apache.shiro.authc.UsernamePasswordToken;
import org.apache.shiro.authz.AuthorizationInfo;
import org.apache.shiro.authz.SimpleAuthorizationInfo;
import org.apache.shiro.realm.AuthorizingRealm;
import org.apache.shiro.realm.Realm;
import org.apache.shiro.subject.PrincipalCollection;
import org.codehaus.plexus.component.annotations.Component;
import org.codehaus.plexus.component.annotations.Requirement;
import org.codehaus.plexus.util.StringUtils;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import eu.europa.ec.digit.drupal.dao.RoleDao;
import eu.europa.ec.digit.drupal.dao.UserDao;

@Component(role = Realm.class, hint = "Drupal", description = "Drupal Realm")
public class DrupalRealm extends AuthorizingRealm {

    private static Logger logger = LoggerFactory.getLogger(DrupalRealm.class);

    @Requirement(hint = "Drupal")
    private UserDao drupalUserDao;

    @Requirement(hint = "Drupal")
    private RoleDao drupalRoleDao;

    @Override
    public String getName() {
        return "Drupal";
    }

    @Override
    protected AuthenticationInfo doGetAuthenticationInfo(AuthenticationToken token) throws AuthenticationException {
        logger.debug("DrupalAuthorizationManager.doGetAuthenticationInfo");

        if (!UsernamePasswordToken.class.isAssignableFrom(token.getClass())) {
            logger.debug("Not UsernamePasswordToken");
            return null;
        }

        UsernamePasswordToken usernamePassword = ((UsernamePasswordToken) token);
        String username = usernamePassword.getUsername();
        String password = usernamePassword.getPassword() == null ? null : new String(usernamePassword.getPassword());

        String userId = drupalUserDao.authentify(username, password);
        if (StringUtils.isNotBlank(userId)) {
            logger.debug("Authenticated as user with username " + username + " and userId " + userId);
            return new SimpleAuthenticationInfo(username, password, getName());
        } else {
            logger.warn("Authentication failed for user with username " + username);
            throw new AuthenticationException("Invalid username '" + username + "'");
        }
    }

    @Override
    protected AuthorizationInfo doGetAuthorizationInfo(PrincipalCollection principals) {
        logger.debug("DrupalAuthorizationManager.doGetAuthorizationInfo");

        String username = principals.getPrimaryPrincipal().toString();

        logger.debug("User " + username);

        Set<String> roles = drupalRoleDao.getRoles(username);
        if (roles == null) {
            logger.warn("User " + username + " has no roles");
            return null;
        } else {
            //roles.add("drupal_user");
            logger.debug("User " + username + " has roles: " + roles);
            return new SimpleAuthorizationInfo(roles);
        }
    }
}
