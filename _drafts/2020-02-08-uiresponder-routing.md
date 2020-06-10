---
title: Routing Views with UIResponderChain
date: 2020-02-08
layout: post
---

Typically when I need to set up navigation in an iOS application, there 
is always a need to set up routing, this is sometimes achieved through
delegation, sometimes it's segues, but every time its annoying busy work
that engineers have to set up and maintain. 

Not Anymore!

That statement is actually a bit misleading, because I am sure some
developers have been using the method I am about to share in some form
for years, in fact, UIResponder chain has been part of UIKit since
iPhoneOS 2.0 and was has been a part of OS X as NSResponder since 
the beginning.

