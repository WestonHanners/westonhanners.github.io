---
title: Inheriting Equatable in Swift
date: 2015-08-25
layout: post
---

Today, I was working on creating some Swift objects that needed to
conform to the Equatable protocol. Generally this is quite easy as you
just implement the == function for the class.

```
func ==(rhs: , lhs: ) -> Bool {
    return 
}
```

The issue is these functions are required to be global (that's the way
operator declarations work in Swift), so there is no easy way to inherit
your equality from super classes. Here is an incredibly contrived
example:

```
class Person: Equatable {
    var name: String = ""
}

class Employee: Person {
    var position: String = ""
}

func ==(lhs: Person, rhs: Person) -> Bool {
    return lhs.name == rhs.name
}

func ==(lhs: Employee, rhs: Employee) -> Bool {
    return lhs.name == rhs.name && lhs.postion == rhs.position
}
```

Say we want to implement Equatable for
both of these classes. We will want Equatable for Person objects to mean
they have the same name (this is really all we have in this class, but
pretend it was more complicated). Employees can have the same name, but
their equality will also depend on their position (manager, worker,
owner, etc..). We don't want to have to reimplement the Person ==
functionality in our subclass, usually you would want to call to super,
but since Swift operators are global, you have no sense of super.
The solution is actually quite simple when you think about it. You want
to move the Equatable logic into the classes where they can call to
super. Just have your == function call into equalTo() on your instances,
you can create it like this.

```
func ==(lhs: Person, rhs: Person) -> Bool {
    return lhs.equalTo(rhs)
}

func equalTo(person: Person) -> Bool {
    return self.name == person.name
}
```

Now you can then easily call the equalTo() function in your parent
class. Here is the the completed solution, and [Playground][1].

```
func ==(lhs: Person, rhs: Person) -> Bool {
    return equalTo(rhs)
}

func ==(lhs: Employee, rhs: Employee) -> Bool {
    return lhs.equalTo(rhs)
}

class Person: Equatable {

    var name: String = "Bob"

    func equalTo(person: Person) -> Bool {
        return self.name == person.name
    }
}

class Employee: Person {

    var position: String = "Manager"

    func equalTo(person: Employee) -> Bool {
        var match = super.equalTo(person)
        match = match && self.position == person.position
        return match
    }
}
```

> This was tested on Swift 1.2

**UPDATE 11/6/2015:** Creating an isEqual function on NSObject subclasses was causing issues, changing to
equalTo() fixes this.

[1]: /downloads/Equatable.playground.zip