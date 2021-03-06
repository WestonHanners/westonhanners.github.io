---
title: Auto-Completion And Organization for NotificationCenter
date: 2017-01-23
layout: post
---

I may be late to the party, but I just discovered the most amazing trick thanks to 
[this article][1].

Have you seen this before?

```
NotificationCenter.default.post(name: NSNotification.Name(rawValue: "didSomething"), object: nil)
```

... yea, its pretty ugly, not to mention incredibly error prone. If you have to use this same
notification in multiple parts of your app, you are very likely to typo that string literal at
some point.

But, I just discovered some syntax sugar to help clean that up.

```
extension NSNotification.Name {
    static let appDidSomething = NSNotification.Name(rawValue: "didSomething")
}
```

With that in place, you can start adjusting your call-sites like this.

```
NotificationCenter.default.post(name: .appDidSomething, object: nil)
```

How glorious is that?

In retrospect, it seems a bit obvious, but the best tricks usually are.

[1]: http://swiftandpainless.com/selector-and-the-responder-chain/