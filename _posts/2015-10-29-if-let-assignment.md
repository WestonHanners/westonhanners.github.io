---
title: If-Let Assignment Operator
date: 2015-10-29
layout: post
---

> This article was updated on 12/06/2017 to account for Swift 4

How many times have you had to implement this pattern?

```
if let value = someOptionalValue as? String {
    self.value = value
}
```

I use this all the time when parsing through JSON or implementing
NSCoding and I think its a little over verbose for Swift, I felt sure
there was a better way. [NSHipster][1] mentions a logical OR assignment
operator (||=) which would be perfect however, it doesn't seem to be
implemented for generics *(Please let me know if I am wrong here)*. I
thought I would give it a try...

```
precedencegroup AssignmentPrecedence {
    associativity: right
}

infix operator ?= : AssignmentPrecedence

func ?=<T>(left: inout T, right: T?) {
    if let value = right {
        left = value
    }
}
```

It actually worked quite well, I was able to reduce the original code to
this

```
self.value ?= someOptionalValue as? String
```

Might not be the biggest win, but when you have several of these
assignments in a row, it saves a lot of code and makes it much more
readable. One more thing... and I am still trying to figure out exactly
what is going on here, but I ended up having to define a second function
to assign to optionals. The only difference is the left parameter now is
T?

```
func ?=<T>(left: inout T?, right: T?) {
    if let value = right {
        left = value
    }
}

var someOptionalString: String?

someOptionalString ?= newValue // Will assign when newValue is not optional
```

If you are interested in seeing this in action, here is the [Playground][2]

[1]: http://nshipster.com/swift-operators/
[2]: /downloads/if-let-operator.playground.zip