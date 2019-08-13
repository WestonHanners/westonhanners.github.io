---
title: How I Finally Understood Swift Optionals
date: 2014-08-04
layout: post
---

I had a bit of trouble understanding Swift Optionals. When should I use
a question mark, and when should I use an exclamation point? The iBook
was a bit confusing on this point for me. Until I was sitting at
IndyCocoaHeads last night and [@AndyDuff][1] was giving a talk
about Swift. When he got to the part about Optionals, something finally
clicked for me and I was able to finally understand them.

## Optionals are like Schrödinger's Cat!

Think of it like this, you can have an integer, and we all know that
integers are whole numbers (-1, 0, 1 , 2, 3...) within a certain range
depending on what type of system you are on. In Swift you would declare
it as such:

```
var n: Int = 23
```

The compiler does not need the type here, but I included it for clarity.
This is telling the compiler that while, n "could" be any integer, here,
it's 23. Now lets look at an Optional:

```
var n: Int? = 23
```

In this line we are telling the compiler something else. Currently n
is 23, but n "could" be any integer **OR nil**. If you are familiar with
Objective-C, this is quite familiar with NS objects. NSString can equal 
@"Hello, World" but you can also set it to nil, which is not a string,
or any type for that matter. This is why I like to say it's
like [Schrödinger's Cat][2] If you are not familiar with the concept, 
I believe [this link][3] is a fun place to start. Essentially the variable 
can contain a value, or nil (the cat is either alive or dead), but we don't 
know until we check.

```
if (n != nil) {
    println("n = \(n!)." // Note the ! after n.
}
```

Once you are 100% sure that n *does* have a value, then you can force it
to behave like a normal integer by using "**!**", if you use ! and n is
a nil value, then your app will crash.

```
var n: Int? // Optionals default their initial value to nil.
println("n = \(n)." // This will crash because it's trying to print nil.
```

Once you get the hang of it, it becomes natural and feels like things we
have done in Objective-C for quite some time now just we now have access
to this feature on "Primitive" types.

[1]: https://twitter.com/theredheadnerd
[2]: http://en.wikipedia.org/wiki/Schrödinger's_cat
[3]: http://www.explainxkcd.com/wiki/index.php/45:_Schrodinger