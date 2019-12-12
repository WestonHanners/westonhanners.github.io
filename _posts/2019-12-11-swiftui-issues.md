---
title: Reasons SwiftUI might not be right for you... yet
date: 2019-12-11
layout: post
---

The project I was working on ended and gave me some spare time this week, so I
decided to tinker with SwiftUI to see what it could do for myself. While I was
impressed with how easy it was to get pixels on-screen, test them and get data
flowing, I did run into several issues. I am going to document them here.

## Navigation Bar Customization (Missing Feature)

This should have been simple, a navigation bar with left and right buttons, a
text-based title, and a tint color applied. Looking at the documentation it
would appear `.accentColor()` is what I wanted. I applied it and found that
while it does apply the tint color to bar items, it does not apply it to the
title text.

for the record, I also tried setting `.foregroundColor()` to the same effect

I have filed a Radar for this.

## Scroll View Paging (Missing Feature)

If you want a scroll view to snap to pages (useful for snapping to cards or
other content) in UIKit it was as easy as setting `.isPagingEnabled = true` on
a UIScrollView. This feature seems to have been omitted from SwiftUI

I will be filing a Radar for this.

## Navigation Links Only Work Once (Bug)

Take the following example using Xcode Version 11.3 (11C29), This is currently
the latest build.

```
struct Detail: View {
    var body: some View {
        Text("Detail")
    }
}

struct ContentView: View {
    var body: some View {
        NavigationView {
            List {
                NavigationLink(destination: Detail(), label:{ Text("Hello") })
                NavigationLink(destination: Detail(), label:{ Text("Hello 2") })
            }
            .navigationBarTitle("Testing")
        }
    }
}
```

If you were to launch this and tap the first link, tap back, then tap the first
link again, it will not load.

Tapping the second link, in this case, *will* load.

## Most Autocompletes Do Not Work As Expected (Editor Issue)

Buttons are the obvious offender.

```
Button(action: {

}, label: { () -> PrimitiveButtonStyleConfiguration.Label in

})
```

Most of the time, what you are looking for is

```
Button(action: {
    print("Hello")
}) {
    Text("Hello")
}
```

I am still not sure what `PrimitiveButtonStyleConfiguration.Label` means.

## No Good CollectionView Equivalent (Missing Feature)

While you can create some decent views that look like CollectionView by nesting
scroll views, there is no decent way to do this in a way where data is 
dynamically loaded.

The only component in SwiftUI that appears to use dynamic loading is List.
ScrollView will require all items to be loaded into memory before it can
render. 

All of this to say, if you need a horizontal scroll view to load in many items,
SwiftUI will cause you some serious performance issues.

## Conclusion

SwiftUI is really fun and the data flow is just awesome. It makes building new
screens super quick and opens the door to a ton of prototyping.


I am sure these will all be fixed in time, but many of these are deal-breakers
and as it is right now, I will not recommend SwiftUI for any paid projects I 
am involved with. 

