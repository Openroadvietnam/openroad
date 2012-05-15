package eu.europa.ec.digit.drupal.dao;

import java.util.Set;

import eu.europa.ec.digit.drupal.domain.DrupalUser;

public interface UserDao {

    Set<DrupalUser> findAll();

    DrupalUser findByUserId(String userId);

    Set<String> findAllUserId();

    String authentify(String username, String password);

}
