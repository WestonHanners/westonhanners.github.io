---
title: Scroll to top in iOS 13 UI Testing
date: 2019-08-08
layout: post
---

In XCTestCase if you want to scroll to the top of a scrollable view, you 
tap on the status bar

```
XCUIApplication().statusBars.firstMatch.tap()
```

However, this is doesn't work in iOS 13.

I filed a radar during the beta and they just got back to me with this.

The status bar is no longer part of the application, it's part of the system 
UI ("springboard"). Change your test as follows:

```
let systemApp = XCUIApplication(bundleIdentifier: "com.apple.springboard")
systemApp.statusBars.firstMatch.tap()
```

This seems like it should be important, but it was not documented anywhere on
Apple’s website.

If still need to support Xcode 10 / iOS 12, I recommend using the 
following extension

```
extension XCUIElement {
    func scrollToTop() {
        if #available(iOS 13, *) {
            let systemApp = XCUIApplication(bundleIdentifier: "com.apple.springboard")
            systemApp.statusBars.firstMatch.tap()
        } else {
            XCUIApplication().statusBars.firstMatch.tap()
        }
    }
}
```

I figured I would share this so that it is at least documented somewhere.
