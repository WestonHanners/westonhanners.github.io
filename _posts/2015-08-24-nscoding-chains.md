---
title: NSCoding class chaining with Swift
date: 2015-08-24
layout: post
---

While I was trying to get some Swift classes to conform to
NSCoding so that I could serialize them, I found out that it can be a
little annoying to get the init(coder:) calls to chain through your
class hierarchy. All of the resources I found online suggested that my
initializers need to be declared as convenience, however if I declared
them as such, they would complain that you need to call self's
designated initializer. I could remove the convenience, but this is
quite annoying because it forced me to do all of my initialization with
a coder. After a little research, I discovered that I needed to remove
the convenience AND make sure I also override the default init. I
believe the issue is that the default init is marked as designated and
forces your subclasses to call init(), if you override without required,
you can call a different initializer from a subclass. Here is a short
example and a [Playground][1]

```
class Person: NSObject, NSCoding {

    var name: String = "Bob"

    override init() {
        super.init()
    }

    required init(coder aDecoder: NSCoder) {
        self.name = aDecoder.decodeObjectForKey("name") as! String
    }

    func encodeWithCoder(aCoder: NSCoder) {
        aCoder.encodeObject(self.name, forKey: "name")
    }
}

class Employee: Person {

    var position: String = "Manager"

    override init() {
        super.init()
    }

    required init(coder aDecoder: NSCoder) {
        super.init(coder: aDecoder)
        self.position = aDecoder.decodeObjectForKey("position") as! String
    }

    override func encodeWithCoder(aCoder: NSCoder) {
        super.encodeWithCoder(aCoder)
        aCoder.encodeObject(self.position, forKey: "position") 
    }
}

var person = Employee()
person.name = "Bill"
person.position = "Worker"

print(person.name)
print(person.position)

let data = NSKeyedArchiver.archivedDataWithRootObject(person)
let newPerson = NSKeyedUnarchiver.unarchiveObjectWithData(data) as? Employee

print(person.name)
print(person.position)
```

> This has been tested with Swift 1.2

[1]: /downloads/NSCoding-Playground.zip