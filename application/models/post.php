<?php
class Post extends Eloquent {
$orgs = Orgs::all();

foreach ($orgs as $orgs)
{
     echo $user->orgs_name;
}
$orgs = Orgs::find(1);

$orgs->orgs_name = 'HP';
$orgs->orgs_adress = 'Germany';

$orgs->save();
}