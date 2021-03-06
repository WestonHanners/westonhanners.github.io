---
title: The Trap of Libraries
date: 2017-12-17
layout: post
---

One of the worst feelings I can ever have in iOS Software Engineering is cloning
an existing project for the first time and looking at the Podfile. I feel it gives
me a good sense of how the project is going to go. If there are only 1 or 2 pods,
I sigh a breath of relief, if there are more, I start the mourning process.

It's not like having a handful of pods are always a bad thing, but most of the time
they definitely are.

Here is a short list of things that I don't mind seeing in a Podfile.

- HockeyApp
- Fabric
- Google Analytics
- Urban Airship

Libraries like these are helpful, they integrate backend services that might be
overwhelming to create from scratch, and allow you to focus more on your app.
While they tend to be a little larger than one would like, the companies that maintain
them tend to spend time making sure they are low impact, relatively bug-free, and
fairly easy to keep updated.

Here is a list of libraries that send a chill down my spine.

- ReactiveCocoa
- Mantle
- AFNetworking
- Facebook Pop
- ZXingObjC

There are many more I could list here, but let's get to the point. These libraries
are a loan from the bank of tech debt. Using some of these commits large portions
of your code to require constant maintenance, and you can only avoid it for so long.

## The First Problem

When I tell people my thoughts on these libraries, they always tell me...

> They are open source, if there is something you don't like you can always just fix it.

or 

> If the maintainer goes away or stops supporting it, you can take it up.

Let's run a little thought experiment on this, shall we?

Take AFNetworking for example...

If I am building a library that uses Apple's URLSession to build my network stack,
I can be fairly confident that it will be maintained as long as the platform is.
It has a lot of features, is relatively bug-free, and I don't have to pour over its
source-code with every update to make sure it is following the new best practices.

However, if I use AFNetworking, I potentially have to wait weeks before
new language, security, and platform features are integrated. I am not sure if
you remember the [certificate pinning issue][1], but the gist of it is that the
maintainers identified a security issue introduced in one of their patches and,
to their credit, they patched it in about a week. The problem arose in that every
developer who used the library didn't follow the news, or had to wait for internal
company processes to allow a release, then wait for Apple's (at the time), slow,
app review to patch this vulnerability. The effect of this was that over 1000 apps
on the app store had this issue.

Now this is a big, frequently used library and the maintainers did the best they
could to fix the problem as quickly and as loudly as they could, but can you say
that you follow the git issues and blogs related to every single library you use?
A small "syntactic sugar" library could easily introduce security issues without
your knowing, and if it's not used by A LOT of people, it will fly completely under
your radar (I will avoid the obvious pun here). 

And what if this library wasn't even well maintained?

Yes, you could fork the library and start maintaining it yourself, but do you think
your clients and managers will agree that spending several hours a week maintaining a
library is a good thing? How would they feel if you are only using a couple functions?
If they are ok with it, you probably have a great job with very understanding
colleagues and you are probably on retainer, or work in a big corporation.
Consulting/Agency work doesn't usually afford this luxury.

Even if you only use popular, well-maintained libraries, you can still be hit by...

## The Second Problem

In the beginning of this article, I talked about the dread I feel opening up an
existing project's Podfile for the first time, the worst thing you can see is at
the top.

    platform :ios, '6.0'

This means one or two of the following. 

1. This project hasn't been updated in a LONG time.
2. This project relies on a library that no longer exists.

If the issue is the former, you will probably have well over 100 random deprecated
API warnings, and if you are lucky, only a couple hard errors. If it is the latter,
get prepared to spend a lot of time extracting that pod from the application.

For example, I am looking forward to having to spend quite a few hours extracting
Mantle from an application because the app heavily relies on a feature no longer
present. This is not even close to the first time I have had to deal with this.
Smaller libraries are a bit more loose with redefining their entire API in an
update, completely breaking the hosting app, and sometimes introducing new bugs
that can take weeks of updating to work out.

It can also be easy for someone working on the project to work around issues and
never actually update the library. When it finally comes time that you do run
`pod update`, you might find that you now have a week or more of fixes to get
the new library running. Maybe you are the good guy (or gal) who spends time
keeping pods updated and therefore you don't have to waste weeks doing the epic
rewrite, if you are this person, would you like a [job][3]?

Libraries can be useful when a task is too complicated or requires large amounts
of infrastructure, but what I see a lot of the time are tiny, single-purpose,
libraries that only marginally improve the workflow.

This sort of library can also dictate your entire architecture. They can lock you
into something that might be trendy now, but in a year or two, you find yourself
scratching your head and wondering how you ever got into this mess in the first
place.

## The Solution

If you are using a smaller library, why not write it yourself? Autolayout DSL's,
JSON parsers, custom animations; these aren't generally very complicated to do
on your own and since you wrote it, you should be able to easily fix it when
needed. It will reduce app bloat, improve security, and you will get better at
the problems these libraries solve.

Reducing boilerplate and simplifying common programming tasks are the siren
songs of software engineering, they can be quite attractive, and it is easy
to add them to your project. In reality, for larger projects, they are traps
that lock you into spending quite a lot of your time putting out the fires
they can create. 

If you want my opinion, they are best avoided when possible.

## Afterthoughts

It was not my intent to spend so much time picking on AFNetworking, it
just provided a good example for issues I will encounter. AFNetworking was
incredibly useful back before NSURLSession was a thin, but it is so easy to
do it right with just foundation libraries these days, I wonder why it is
still so popular for simple networking tasks. If you know why, please
[tweet at me][2].

[1]: https://gist.github.com/AlamofireSoftwareFoundation/f784f18f949b95ab733a
[2]: https://twitter.com/WestonHanners
[3]: https://ymedialabs.com/careers/
