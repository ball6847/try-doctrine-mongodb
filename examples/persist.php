<?php

include __DIR__.'/../bootstrap.php';

// create user
$user = new Documents\User();
$user->setName('Bulat S.');
$user->setEmail('email@example.com');

// tell Doctrine 2 to save $user on the next flush()
$dm->persist($user);

// create blog post
$post = new Documents\BlogPost();
$post->setTitle('My First Blog Post');
$post->setBody('MongoDB + Doctrine 2 ODM = awesomeness!');
$post->setCreatedAt(new DateTime());

$user->addPost($post);

// store everything to MongoDB
$dm->flush();
