package eu.europa.ec.digit.nexus.security.drupal;

import java.util.HashSet;
import java.util.Set;

import org.codehaus.plexus.component.annotations.Component;
import org.codehaus.plexus.component.annotations.Requirement;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.sonatype.security.authorization.AbstractReadOnlyAuthorizationManager;
import org.sonatype.security.authorization.AuthorizationManager;
import org.sonatype.security.authorization.NoSuchPrivilegeException;
import org.sonatype.security.authorization.NoSuchRoleException;
import org.sonatype.security.authorization.Privilege;
import org.sonatype.security.authorization.Role;

import eu.europa.ec.digit.drupal.dao.RoleDao;
import eu.europa.ec.digit.drupal.domain.DrupalRole;

@Component(role = AuthorizationManager.class, hint = "Drupal", description = "Drupal Authorization Manager")
public class DrupalAuthorizationManager extends AbstractReadOnlyAuthorizationManager {

    private static Logger logger = LoggerFactory.getLogger(DrupalAuthorizationManager.class);

    public static final String SOURCE = "Drupal";

    public String getSource() {
        return SOURCE;
    }

    @Requirement(hint = "Drupal")
    private RoleDao drupalRoleDao;

    // Roles

    private Role toRole(DrupalRole drupalRole) {
        logger.debug("DrupalAuthorizationManager.toRole");
        
        if (drupalRole == null) {
            logger.debug("null");
            return null;
        }
        
        Role role = new Role();

        role.setRoleId(drupalRole.getId());
        role.setSource(this.getSource());
        role.setName(drupalRole.getName());
        role.setReadOnly(true);

        logger.debug(role.toString());
        return role;
    }

    public Set<Role> listRoles() {
        logger.debug("DrupalAuthorizationManager.listRoles");
        
        Set<Role> roles = new HashSet<Role>();

        for (DrupalRole role : drupalRoleDao.findAll()) {
            logger.debug("" + role);
            roles.add(toRole(role));
        }

        return roles;
    }

    public Role getRole(String roleId) throws NoSuchRoleException {
        logger.debug("DrupalAuthorizationManager.getRole " + roleId);
        
        DrupalRole drupalRole = drupalRoleDao.findByRoleId(roleId);
        if (drupalRole != null) {
            logger.debug("Found");
            return toRole(drupalRole);
        } else {
            logger.debug("Not found");
            throw new NoSuchRoleException("Role '" + roleId + "' not found.");
        }
    }

    // Privileges

    public Privilege getPrivilege(String privilegeId) throws NoSuchPrivilegeException {
        return null;
    }

    public Set<Privilege> listPrivileges() {
        return null;
    }

}
