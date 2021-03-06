---
title: Format specifiers for NSInteger and NSUInteger (Without Warnings)
date: 2014-07-24
layout: post
---

    %zd = NSInteger
    %tu = NSUInteger
    %tx = Hex

I have been bothered by the fact that if I use NSInteger NSUInteger in
\[NSString stringWithFormat:\], I will get warnings depending on what
architecture I am building for. 

![Does this look familiar?][1]
> Does this look familiar?

You can change the format to `%ld` and the cast to (long), but that felt really 
awkward. After googling around for a while and even [Apple's Documentation][2]
is not helping much, I decided to pose the question in \#iphonedev. I got a
response from someone named "Jer" with the following [link][3] Gred Parker 
describes the `%zd (NSInteger)`, `%tu (NSUInteger)` and `%tx (Hex)` format
specifiers which will suppress the warnings when switching architectures. 

I immediately double-checked the docs to
make sure I hadn't overlooked something, and I had not. So I filed a bug
report with Apple and hopefully this will get cleared up soonish. In the
mean time I decided to make this blog post, to help Google, help others.

[1]: /images/Screenshot-2014-07-24-11.38.46.png
[2]: https://developer.apple.com/library/mac/documentation/Cocoa/Conceptual/Strings/Articles/formatSpecifiers.html
[3]: https://twitter.com/gparker/status/377910611453046784