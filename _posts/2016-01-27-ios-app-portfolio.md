---
title: How to Start an iOS App Portfolio
date: 2016-01-27
layout: post
---

Since my post [yesterday][1],
the most common question I have received is 

> "What sort of app should I build for my Portfolio?"

This is an interesting question. Ideally, you
would do the same thing you would if you wanted to build an app not for
a portfolio. Start by identifying a problem that you feel like you can
solve and then solve it in the best way possible. But I can imagine a
new developer might not be ready to deal with all the issues surrounding
developing an original idea from scratch. That said, my goto response is
usually "Make a Twitter app". Twitter clients are interesting because
they will exercise a lot of the skills required to build apps in
general. I will list a few of the things I would expect a portfolio
quality Twitter app to use (or any portfolio quality app).

## It Uses UITableView...

Most iOS apps that I have built have used UITableView in some way or
another, it's probably the most common user interface element in a
standard app and being able to demonstrate its usage looks great when
applying for a job. This works great for building a Twitter timeline.
Try to implement swipes to add actions to your rows and make sure you
show proper cell reuse. Look up methods for paging tweets so that when
you reach the bottom of the timeline, more cells will load in.

## It Uses HTTP API...

There are not many apps for iOS that won't need some sort of network
resource and being able to connect, authenticate and use data from a web
service is something you end up doing a lot. Now, I do think you can get
away with using the Twitter SDK, but attempting their REST web service
would really show you know how to connect to and use HTTP web services.

## It Uses Interesting UI...

A lot of customers like their iOS apps to stand out and a Twitter app
presents a lot of opportunities to flex your UI building skills and make
something interesting and fun to use. Interesting UI can be anything
from some sort of custom-built button to a use of graphics and
animations to make your app feel fun and alive. Something I like to do
is look at some of the more popular apps on the AppStore and try to see
if I can duplicate some of the animations and UI elements that they use.

## It Uses Persistence and Security...

There is not much you really need to persist in a twitter app except for
one important piece, credentials. You will need to show how to store
user credentials (or more likely their token) in a secure way. Use of
the Keychain API is your friend here and while it's a bit of a pain to
learn, it's better than leaking user data and putting accounts at risk.
Don't take security lightly

## It is relatively simple to build...

A Twitter app doesn't take a year to build, so you can probably whip one
out in a week or two if you can find the time to sit down and code.
Portfolio apps don't need to be big complex pieces of software, iOS
tends to work best with simple apps and so it's perfectly fine to build
simple apps for your portfolio. Twitter is just one of the things I like
to suggest because it touches so many commonly used parts of iOS. If you
are still wanting more, here are a few other ideas to get your gears
turning.

-   Notes app ( Demonstrates text manipulation, bonus points for iCloud
    syncing the notes)
-   Where Did I Park? (An app to mark places on a map and store them for
    later, demonstrate the use of the location API)
-   Painting App (Demonstrates use of Touch and Graphics API)
-   Alarm Clock (Use local notification and audio playback)

Whatever you decide to build, try to follow some sort of style guide and
make your code as clean and easy to read as possible, you will want to
to be something you can print out and show to recruiters if need-be.

**TL;DR:** Build an app that is simple, yet uses as many common iOS
features as possible. Make it as pretty as you can, and polish to a
shine. Repeat till you have a couple of apps under your belt.

Good Luck!

[1]: blog/2016.01.26

