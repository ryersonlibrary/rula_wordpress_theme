<?php
/**
 * Template part for team member profiles
 */
?>

<style>
  .rula-team-profile {
    display: flex;
    align-items: flex-start;
  } 

  .profile-pic {
    flex: 0 1 300px;
  }

  .profile-bio {
    flex: 1;
    padding-left: 1.5em;
  }

  .profile-bio h3, .profile-bio h4 { 
    margin-top: 0; 
    margin-bottom: 0.35em; 
  }

  @media screen and (max-width: 37.5em) {
    .profile-pic {
      flex: 0 1 150px;
    }
  }

</style>

<div class="content-area rula-team">
  <div class="rula-team-profile">
    <div class="profile-pic">
      <img src="http://lorempixel.com/500/500/cats" />
    </div>
    <div class="profile-bio">
      <h3>Jayden Pereira</h3>
      <h4>Student, Business Technology Management</h4>
      <p>
      Jayden is a first year international student from Bahrain, currently studying in the Business Technology Management program.

      He is an avid technology enthusiast and advocate, taking every opportunity to tell other students that the Digital Media Experience Lab feels like home to him. He is currently involved in a number of campus organizations, including DECA (what is DECA?) and Women in Technology.
      </p>
    </div>
  </div>
</div>