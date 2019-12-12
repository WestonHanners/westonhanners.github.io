---
title: Reasons SwiftUI might not be right for you... yet
date: 2019-12-11
layout: post
---

The project I was working on ended and I had a little time this week, so I
decided to tinker with SwiftUI to see what it could do for myself. While I was
impressed with how easy it was to get pixels on screen, test them and get data
flowing, I did run in to several issues. I am going to document them here.

## Navigation Bar Customization

This should have been simple, a navigation bar with left and right buttons, a
text based title, and a tint color applied. Looking at the documentation it
would appear `.accentColor()` is what I wanted. I applied it and found that
while it does apply the tint color to bar items, it does not apply it to the
title text.

I have filed a Radar for this.

## Scroll View Paging

If you want a scroll view to snap to pages (useful for snapping to cards or
other content) in UIKit it was as easy as setting `.isPagingEnabled = true` on
a UIScrollView. This feature seems to be completely omitted from SwiftUI

I will be filing a Radar for this.

