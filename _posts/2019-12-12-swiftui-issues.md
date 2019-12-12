---
title: Some reasons SwiftUI might not be right for you
date: 2019-12-12
layout: post
---

As work slows down for the holidays, I have found myself with some spare 
time. I decided to sit down and tinker with SwiftUI to see what it could do. 
While I was impressed with how easy it was to get pixels on-screen, test them 
and get data flowing, there are still several issues. I am going to document 
them here.

## Navigation Bar Customization (Missing Feature)

This should have been simple, a navigation bar with a left button, a right 
button, a text-based title, and a tint color applied. Looking at the 
documentation it would appear `.accentColor()` is what I wanted. I applied it 
and found that while it does apply the tint color to bar items, it does not 
apply it to the title text.

There is a terrible workaround where you can set the leading items as an Hstack,
Add a title view, then set the width to match the screen, but I *really* do not
recommend doing this.

for the record, I also tried setting `.foregroundColor()` to the same effect.

Filed a Radar.

## Scroll View Paging (Missing Feature)

If you want a scroll view to snap to pages (useful for snapping to cards or
other content) in UIKit it was as easy as setting `.isPagingEnabled = true` on
a UIScrollView. This feature seems to have been omitted from SwiftUI.

Filed a Radar.

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

Filed a Radar.

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
scroll views, there is no method of doing this where the data is dynamically
loaded.

The only component in SwiftUI that appears to use dynamic loading is List.
ScrollView will require all items to be loaded into memory before it can
render.

All of this to say, if you need a horizontal scroll view to load in many items,
SwiftUI will cause you some serious performance issues.

I am not sure if this is intentional or not. It is possible that Apple doesn't
want heavy usage of horizontal scroll views.

I will be watching this going into June.

## Conclusion

SwiftUI is really fun and the data flow is just awesome. It makes building new
screens super quick and opens the door to a ton of prototyping.


I am sure these will all be fixed in time, but many of these are deal-breakers
and as it is right now, I will not recommend SwiftUI for any paid projects I 
am involved with. 

> This article will be updated as I find more issues.
