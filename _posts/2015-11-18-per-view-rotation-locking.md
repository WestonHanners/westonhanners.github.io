---
title: Per-View Auto-Rotation Locking Made Easy for iOS 8 and 9
date: 2015-11-10
layout: post
---

This week I was working on an app where the client wanted to lock the
app rotation to Portrait on some screens and Landscape on others.
Luckily I had built all of my views in AutoLayout so they already
supported the required layouts, I just needed to lock them. Rotation
API's are one of the most frequently deprecated parts of UIKit so when I
started working on this, I had to look it up, and let me say, it's
pretty noisy out there. After an hour or so of research and another hour
or two of experimentation, I finally boiled it down to two parts.

Select ALL POSSIBLE interface orientations you plan to support in your Info.plist.

![Screenshot][1]

Then you *really* only have to implement one method.

## Swift 1.2

```
override func supportedInterfaceOrientations() -> Int {
    return Int(UIInterfaceOrientationMask.Portrait.rawValue)
}
```

## Swift 2.0

```
override func supportedInterfaceOrientations() -> UIInterfaceOrientationMask {
    return UIInterfaceOrientationMask.Portrait
}
```

Making sure to select Portrait or Landscape depending on what you want.
This is probably one of the messiest API transitions I have seen
recently and it took me a while to actually notice what I kept doing
wrong in Swift 1.2. (that Int cast is ugly)

[Sample Code][2]

[1]: /images/InterfaceOrientation.png
[2]: /downloads/RotationTest.zip