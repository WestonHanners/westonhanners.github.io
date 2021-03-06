---
title: The Thing About Storyboards
date: 2019-04-07
layout: post
---

This has been a long time coming. Just to cut to the point, I am not a fan of
Storyboards in professional, medium to large scale iOS apps. There are a few
merits for getting newbie developers started and possibly for small-scale apps.
For anything else, the cons absolutely outweigh the pros.

Storyboards are a great idea in theory. They can help new projects get pixels on the screen faster and 

## Source Control Systems

Some of my arguments might be... well, arguable, but this one is not. Storyboards
are just not designed for use in source control systems like Git or Subversion.
Yes, it is XML (or JSON) so it is technically human-readable, but Xcode (for some
reason I will never understand) decides to use nonsense for element id's. It will
also randomly decide to update parts of your storyboard just because you opened
it.

![Image of useless a storyboard diff][1]
> Yea, that was totally necessary, thanks Xcode.

This means that if you have a team of more than one, when (and yes, I mean when)
you have merge conflicts, someone has to try to parse through it to find out if
the several hundred lines of diff's are needed or not.

Some teams will try to work through this by establishing processes to make sure
only one person is working on a given Storyboard at a time, but then you are now
letting the tools dictate your development process rather than the other way
around. It will make teams inefficient and good luck explaining to your PM why
you had to spend a day to make a single change to the layout of a screen.

I have to take a moment here to note that, yes, Storyboard References were added
and they do help mitigate the problem and if you are dead set on using
Interface Builder, you should be using Storyboard References right now, or you are
making life a lot more difficult for yourself.

## Obfuscated Properties

I have this same issue with pretty much any GUI based software tool (I am looking
at you Unity).

Answer this question for me, what is the easiest way to see all of the outlets
on your screen and what they are linked to? You might say click on your View
Controller and look at the Connections Inspector, and you would be only half-right.
The connection's inspector only shows outlet connections to the currently selected
class. So if you have buttons connected to other objects, then have fun clicking
on every object in the currently open storyboard.

Here's another... How do you quickly see the font size for every text field in
a storyboard? The answer, you click on every button, and look at the Attributes
Inspector. If you have more than a couple text fields, this can quickly become a
real pain in the butt.

I am really irritated by any WYSIWYG editor that has elements with more properties
than can be shown on a single screen. Oh, and a call back to my first point, every
time you click on one of those objects to inspect it's property, you run a chance
of causing Xcode to decide you changed something and it will generate another git
diff.

Same problem with AutoLayout constraints... click, click, click... Oh and you
wanted to change the parent of a particular view? Your layout is now invalid,
it's time to play Find the Broken Constraint!!!

Sorry if I got a bit carried away with that, the number of hours I have lost
simply trying to make a minor UI adjustment with a storyboard is well into the
three digits. They are just too fragile.

## Dependency Injection

You are a good engineer and try to follow best architecture practices. You have
read all of Uncle Bob's Clean Code and try to follow SOLID design principles,
So you try to implement dependency injection for your view controllers.

Unfortunately, as of Xcode 9.2 this is not possible. You can sort of simulate
this by hijacking the initialization process and pulling in dependencies from
public properties, but in the end this will not be the same initialization
process that the Cocoa runtime uses.

## Performance

Storyboard loading in Xcode is really slow... enough said.

## Swift UI

I am greatly looking forward to using Swift UI, this framework is going to fix pretty
much all of my complaints

[1]: /images/storyboard-diff.png