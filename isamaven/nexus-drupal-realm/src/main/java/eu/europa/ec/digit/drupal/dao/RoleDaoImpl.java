package eu.europa.ec.digit.drupal.dao;

import java.sql.SQLException;
import java.util.Collection;
import java.util.Set;

import javax.sql.DataSource;

import org.apache.commons.dbutils.QueryRunner;
import org.codehaus.plexus.component.annotations.Component;
import org.codehaus.plexus.component.annotations.Requirement;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import eu.europa.ec.digit.drupal.dao.handlers.DrupalRoleHandler;
import eu.europa.ec.digit.drupal.dao.handlers.DrupalRoleSetHandler;
import eu.europa.ec.digit.drupal.dao.handlers.StringSetHandler;
import eu.europa.ec.digit.drupal.domain.DrupalRole;

@Component(role = RoleDao.class, hint = "Drupal")
public class RoleDaoImpl implements RoleDao {

    private static Logger logger = LoggerFactory.getLogger(RoleDaoImpl.class);

    @Requirement(hint = "Drupal")
    private DataSourceFactory dataSourceFactory;

    private DataSource getDataSource() {
        return dataSourceFactory.getInstance();
    }

    @Override
    public Collection<DrupalRole> findAll() {
        try {
            logger.debug("RoleDaoImpl.findAllName");
            Set<DrupalRole> roles = new QueryRunner(getDataSource()).query("{call listRoles()}",
                    new DrupalRoleSetHandler());
            /*
             * DrupalRole role = new DrupalRole(); role.setId("drupal_user");
             * role.setName("User authenticated in Drupal"); roles.add(role);
             */
            return roles;
        } catch (SQLException e) {
            throw new RuntimeException(e);
        }
    }

    @Override
    public Set<String> getRoles(String userId) {
        try {
            logger.debug("RoleDaoImpl.getRoles " + userId);
            return new QueryRunner(getDataSource()).query("{call isa_get_roles_per_project(?)}",
                    new StringSetHandler(2), userId);
        } catch (SQLException e) {
            throw new RuntimeException(e);
        }
    }

    @Override
    public DrupalRole findByRoleId(String roleId) {
        logger.debug("RoleDaoImpl.findByRoleId " + roleId);
        try {
            return new QueryRunner(getDataSource()).query("{call getRole(?)}", new DrupalRoleHandler(), roleId);
        } catch (SQLException e) {
            throw new RuntimeException(e);
        }
    }

}
