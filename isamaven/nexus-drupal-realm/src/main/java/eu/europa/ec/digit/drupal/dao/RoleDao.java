package eu.europa.ec.digit.drupal.dao;

import java.util.Collection;
import java.util.Set;

import eu.europa.ec.digit.drupal.domain.DrupalRole;

public interface RoleDao {
    
    Collection<DrupalRole> findAll();
    
    DrupalRole findByRoleId(String roleId);
    
    Set<String> getRoles(String userId);

}
