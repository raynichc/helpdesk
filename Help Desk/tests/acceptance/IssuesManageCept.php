<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('create (on behalf of another) and accept issues');
$I->loginAsAdmin();
$I->amOnModulePage('Help Desk', 'issues_view.php');

// Add ------------------------------------------------
$I->clickNavigation('Create');
$I->seeBreadcrumb('Create Issue');
$I->fillField('issueName', 'Test Issue');
$I->fillField('description', '<p>Test Description</p>');
$I->selectFromDropdown('category', 2);
$I->selectFromDropdown('createFor', 2); 
//TODO: priorities, they don't exist by default so
$I->click('Submit');
$I->seeSuccessMessage();


$issueID = $I->grabValueFromURL('issueID');

// discussView Assign ------------------------------------------------
$I->amOnModulePage('Help Desk', 'issues_discussView.php', ['issueID' => $issueID]);
$I->seeBreadcrumb('Discuss Issue');

$I->click('Accept');
$I->seeSuccessMessage();

//TODO: Modal views be like: no
// discussView Assign ------------------------------------------------
// $I->amOnModulePage('Help Desk', 'issues_discussView.php', ['issueID' => $issueID]);
// $I->seeBreadcrumb('Discuss Issue');
// 
// $I->click('Reassign');
// $I->selectFromDropdown('technician', 1);
// $I->click('Submit');
// $I->seeSuccessMessage();

//Resolve ------------------------------------------------
//TODO: In theory this should work, in practice it's broken even when tested manually so that needs fixing
// $I->amOnModulePage('Help Desk', 'issues_discussView.php', ['issueID' => $issueID]);
// 
// $I->click('Resolve');
// $I->seeSuccessMessage();