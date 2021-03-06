---
title: Self-Explained Swift #2
date: 2017-01-19
layout: post
---

```
// Self-Explained Swift #2
// Tools to make our code easier to manage and read.

import UIKit
import PlaygroundSupport

// Welcome to my second Self-Explained Swift. In this playground, we are starting with
// the code from the previous post but with some new changes and the old comments removed.
// If you feel like you don't understand something, go back and check it out.

// The idea I want to convey in this post is "Tool Creation". You can create many tools
// that can be reused throughout your app that will help cut down on coding mundane tasks
// such as view creation and common layout constraints.

// The "Tools" in this instance will be extensions. If you are not familiar with them,
// extensions allow you to bolt new functions on to existing types. Below I have added
// a few functions to assist us in initializing common UI elements, and generating common
// view layouts.

extension UIView { // Layout extension

    // This function will encapsulate the process of adding a view, enabling autolayout,
    // and configuring the common constraints
    func constrainTo(view: UIView) {

        // Turn on autolayout
        view.translatesAutoresizingMaskIntoConstraints = false

        // Because of the way we worded the function, view will be the parent and self,
        // the child. It might look a little strange here, but as you will see below, it
        // reads quite nicely in the call-sites.
        view.addSubview(self)

        // I was notified about the new NSLayoutAnchor system since my last post, this
        // makes alot nicer constraint building, so we use that here.
        view.topAnchor.constraint(equalTo: self.topAnchor).isActive = true
        view.bottomAnchor.constraint(equalTo: self.bottomAnchor).isActive = true
        view.leftAnchor.constraint(equalTo: self.leftAnchor).isActive = true
        view.rightAnchor.constraint(equalTo: self.rightAnchor).isActive = true

    }

}

extension UIStackView {

    // UIStackView has alot of things that are frequently changed from the defaults. This
    // new init overload will allow us to one-line most of it.
    convenience init(arrangedSubviews: [UIView],
                     axis: UILayoutConstraintAxis,
                     distribution: UIStackViewDistribution,
                     alignment: UIStackViewAlignment) {

        // Chain to the original initializer.
        self.init(arrangedSubviews: arrangedSubviews)

        // Set our custom properties here.
        self.axis = axis
        self.distribution = distribution
        self.alignment = alignment

        // Again, it's nice to hide this away, since we will always need it off anyways.
        self.translatesAutoresizingMaskIntoConstraints = false

    }

}

// Here we are going to make class functions to help create a sort of "theme" for
// our app.

// For the most part, this is just our previous button code, refactored into a
// class function. We provide function parameters to set things likely to be
// different per instance.

// We also want to set translatesAutoresizingMaskIntoConstraints, so we can completely
// remove that from our view controller code.

extension UIButton {

    class func standardAwesomeButton(title: String) -> UIButton {

        let button = UIButton()

        button.setTitle(title, for: .normal)
        button.translatesAutoresizingMaskIntoConstraints = false

        return button
    }

}

extension UILabel {

    class func standardAwesomeLabel(title: String) -> UILabel {

        let label = UILabel()

        label.font = UIFont(name: "Menlo", size: 14)
        label.textColor = .white
        label.text = title
        label.textAlignment = .center
        label.translatesAutoresizingMaskIntoConstraints = false

        return label
    }

}

class OurAwesomeViewController: UIViewController {

    lazy var titleLabel: UILabel = {
        return UILabel.standardAwesomeLabel(title: "Awesome")
    }()

    lazy var button: UIButton = {

        let button = UIButton.standardAwesomeButton(title: "Press Me")
        button.addTarget(self,
                         action: #selector(OurAwesomeViewController.buttonTest),
                         for: .touchUpInside)

        return button
    }()

    override func loadView() {

        super.loadView()

        view.backgroundColor = .blue

        // We are using our custom UIStackView Initializer, This will reduce quite
        // a bit of the duplicated code and make your call-sites much easier to read.
        let verticalLayout = UIStackView(arrangedSubviews: [titleLabel, button],
                                         axis: .vertical,
                                         distribution: .fill,
                                         alignment: .fill)

        verticalLayout.isLayoutMarginsRelativeArrangement = true
        verticalLayout.layoutMargins = UIEdgeInsets(top: 20, left: 20, bottom: 20, right: 20)

        // Call our new layout function, this encapsulates and simplifies the common
        // task of adding views and setting their constraints.
        verticalLayout.constrainTo(view: view)

    }

    func buttonTest(sender: UIButton) {
        view.backgroundColor = .red
    }

}

// Fire up our awesome view controller in a playground.
PlaygroundPage.current.liveView = OurAwesomeViewController()
PlaygroundPage.current.needsIndefiniteExecution = true

// As you can see, this greatly cleans up our layout code and makes it easier to
// manage. The View Controller is now ~43 lines of code and centralizes our styling.
// One forgotten property or function call could have caused your view to not render,
// but with this new setup, that code is now shared among other views and should be
// much easier to diagnose, and less likely to happen in the first place.

// Using these techniques, you can make your view controllers smaller, and simply
// theme creation. You could (if you wanted to) make several extensions for different
// styles of buttons, labels, or any sort of UI element. A change in any one would
// instantly be reflected across your app, with the only downside being the initial
// one-time setup.

// That's it for #2, next time, we will adjust the architecture to move your app-logic
// out of the ViewControllers as well.
```

[Download This Playground][1]

Check out the previous post: [Self-Explained Swift #1][2]

[1]: /downloads/2-LayoutImproved.zip
[2]: blog/2016.12.28