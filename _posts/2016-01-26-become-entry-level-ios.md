---
title: How to become an entry level iOS developer
date: 2016-01-26
layout: post
---

I have been mentoring some friends who are interested in a career in
iOS development, and was asked to come up with some sort of list of what
they should know to get started. This seems like a good topic for a blog
post, so without (much) further ado, I give you my list of what you
should know to become an Entry Level iOS Developer.

## Basic CS Knowledge

I don’t believe that being a computer science PHD is a requirement for
getting into mobile application development, In my experience, heavy CS
concepts don’t often come up in day-to-day work, but a lot of employers
still like to run their interviewees through CS puzzles. So, for the
novice, I would recommend watching the [Harvard CS50 courses on YouTube][1]
as a great place to get started, they are easy to follow and actually
pretty interesting to watch.

If you are planning to interview with one of the big companies like
Google or Apple, you might benefit by picking up a couple algorithm
books to study.

[Cracking the Coding Interview][2]
by Gayle Leekman

[The Algorithm Design Manual][3]
by Steven S. Skiena

## Swift or Objective-C

You don’t have to be an expert, but you should be able to write in at
least one of these languages without having to look up syntax very
often. Just get yourself to a point where you can write classes,
structs, loops, functions, assign variables and evaluate expressions
without help.

Right now we are in a strange time where it’s still acceptable to be
hired only knowing Objective-C. Swift is pretty new and unless you are
applying for a company that has a lot of project turnover, you will
mostly be writing in Objective-C anyways. That said, there are plenty of
companies taking the plunge to Swift (including the one I work for) and
I don’t think it will be too difficult to find a job if it’s the only
language you know. The important thing is to be fairly proficient in
whichever you choose, and get familiar enough with the other that you
can at least read the code.

## Frameworks and API

Cocoa Touch is updated yearly and with it things come and go. It is not
unusual for me to work with the Apple Documentation open most of the
time; there is just too damn much to try to keep in your head.

I don’t think its necessary that you memorize all of the iOS API’s, but
you should have a good idea of what is available to you, and be fluent
in a few of the big ones.

**UIKit** (IUViewController, UITableView, UIButton,
UINavigationController, GestureRecognizers)

**Interface Builder** (Storyboards, Segues, and the odd .xib)

**Foundation Types** (NSArray, NSDictionary, NSString) and their Swift
counterparts (Array, Dictionary and String)

**HTTP API** (NSURLSession, Basic REST API concepts, JSON Parsing with
NSJSONSerialization)

**Grand Central Dispatch** (GCD, NSOperationQueue)

**Persistence** (NSCoding, NSUserDefaults, CoreData)

**Memory Management** (what Retain Cycles are and ARC fundamentals)

Third-Party frameworks can also fun, but try to not depend on them too
much; if it’s something I can do myself, I usually do.

## Development Patterns

Patterns are important, they make development easier and they make your
code cleaner. Make sure you understand these basic patterns, they are
used A LOT in the iOS Frameworks and it is not likely that you will be
able to do much without knowing them. There are many more, but you can
learn those as you go.

**Delegation** (This is sort of the workhorse of most iOS API’s, you
should DEFINITELY understand this)

**Model View Controller** (MVC, I don’t think Apple did the best job of
encouraging best MVC separation, but it’s an important pattern that can
help improve your code if you take the time to implement it properly.
Also, it’s pretty much guaranteed to be on any iOS interviewer’s
question list.)

**Subclassing or Object-Oriented Programming** (The most part you will
be writing apps in this style)

**Singleton** (This one can definitely be abused… use sparingly.)

## Familiarity with the Environment

This might seem obvious, but if you don’t have a Mac, get one! If you
don’t have an iOS device, get one! While it’s not impossible to get
started just writing apps for the simulator, you will eventually want a
real device for development. As for computer, it’s gonna be pretty hard
to learn Xcode without a mac to run it on. I started out with a 2009
MacBook Pro 13″ and a first-gen iPod Touch. It is quite possible to get
by with the lower end devices to start, it was nearly a $1500
investment, but totally worth it in the long run.

## UX/UI

All mobile developers should at least know some of the basic concepts of
design. You should know the difference between mockups and wireframes
and how to use both in your development process. Knowing what Apple
considers usable UI will help as well; for this you will definately want
to read the [Apple Human Interface Guidelines][4]

## Tools

You should be familiar with a few of the common development tools.

**Xcode** (of course)

**Source Control** (Git, Subversion or Mercurial… probably just git
though)

**Issue Tracking Software** (JIRA is the big one here, but there are
others. Just play with some of them if you can.)

## Opinions

Having an opinion about iOS, Swift, or even a specific API is a great
way for interviewers to understand how deep your knowledge about a topic
goes. It also allows us to see your passion. If you are having an
interview and you are asked, “So what do you think of Swift?” saying
“It’s alright, I guess” is not the correct answer, you should tell them
what you think of optionals, how you like using a specific feature.
There aren’t many wrong answers here, the important thing is to have
something to say.

## Portfolio

Actions can speak louder than words. If you really want to nail that
interview, put together a couple of simple apps (or even better, launch
them on the AppStore); they really like to see that you have the ability
to complete a project. GitHub is nice too, but make sure your code is
easy for the interviewers to compile if they wanna test it out.

If you are wanting more resources to get started, please checkout my
[iOS Developer Resources][5] page where I link to blogs and pages I found helpful
when I started out.

I guess the last thing I would add is JUST DO IT! Right now iOS
developers are in high demand and if you can get yourself to a decent
skill level, you won’t be without work for a while. It’s a rewarding job
that allows you to practice both engineering skills and creativity.

{% include ytv.liquid id="ZXsQAXx_ao0" alt="DO IT" %}

**Did I forget something?
Let me know on [Twitter (@WestonHanners)][6]. I want to make
this my go-to resource for helping new developers start their career.**
by the way the company I work for is hiring iOS Developers of all skill
levels, if you are interested, click this link to find out more
[Y Media Labs Careers][7] Be sure to tell them I sent you ;)

[1]: https://www.youtube.com/playlist?list=PLhQjrBD2T383Xfn0zECHrOTpfOSlptPAB
[2]: http://www.amazon.com/Cracking-Coding-Interview-Fourth-Edition/dp/145157827X
[3]: http://www.amazon.com/Algorithm-Design-Manual-Steven-Skiena/dp/1849967202
[4]: https://developer.apple.com/library/ios/documentation/UserExperience/Conceptual/MobileHIG/
[5]: resources/
[6]: https://twitter.com/westonhanners
[7]: http://www.ymedialabs.com/careers/