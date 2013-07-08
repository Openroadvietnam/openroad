package eu.europa.ec.digit.drupal.dao;

import java.sql.SQLException;
import java.util.Set;

import javax.sql.DataSource;

import org.apache.commons.dbutils.QueryRunner;
import org.codehaus.plexus.component.annotations.Component;
import org.codehaus.plexus.component.annotations.Requirement;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import eu.europa.ec.digit.drupal.dao.handlers.DrupalUserHandler;
import eu.europa.ec.digit.drupal.dao.handlers.DrupalUserSetHandler;
import eu.europa.ec.digit.drupal.dao.handlers.StringHandler;
import eu.europa.ec.digit.drupal.dao.handlers.StringSetHandler;
import eu.europa.ec.digit.drupal.domain.DrupalUser;

@Component(role = UserDao.class, hint = "Drupal")
public class UserDaoImpl implements UserDao {

    private static Logger logger = LoggerFactory.getLogger(UserDaoImpl.class);

    @Requirement(hint = "Drupal")
    private DataSourceFactory dataSourceFactory;

    private DataSource getDataSource() {
        return dataSourceFactory.getInstance();
    }

    @Override
    public Set<DrupalUser> findAll() {
        logger.debug("UserDaoImpl.findAll");
        try {
            return new QueryRunner(getDataSource()).query("{call listUsers()}", new DrupalUserSetHandler());
        } catch (SQLException e) {
            throw new RuntimeException(e);
        }
    }

    @Override
    public DrupalUser findByUserId(String userId) {
        logger.debug("UserDaoImpl.findByUserId " + userId);
        try {
            return new QueryRunner(getDataSource()).query("{call getUser(?)}", new DrupalUserHandler(), userId);
        } catch (SQLException e) {
            throw new RuntimeException(e);
        }
    }

    @Override
    public String authentify(String username, String password) {
        logger.debug("UserDaoImpl.authentify " + username);
        try {
            return new QueryRunner(getDataSource()).query("{call isa_authentify(?, ?)}", new StringHandler(), username,
                    password);
        } catch (SQLException e) {
            throw new RuntimeException(e);
        }
    }

    @Override
    public Set<String> findAllUserId() {
        logger.debug("UserDaoImpl.findAllUserId");
        try {
            return new QueryRunner(getDataSource()).query("{call listUserIds()}", new StringSetHandler());
        } catch (SQLException e) {
            throw new RuntimeException(e);
        }
    }

}
