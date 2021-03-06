---
title: Self-Explained Swift #1
date: 2016-12-28
layout: post
---

```
// Self-Explained Swift #1
// AutoLayout... Programmatically

import UIKit // Can't do a layout post without UIKit
import PlaygroundSupport // So we can have this class run in a playground

// I will demonstrate a clear concise way to add elements, separate
// layout concerns, and configure your UI... All without Storyboards.

class OurAwesomeViewController: UIViewController {

    // For each of our UI Elements, we are going to make a lazy
    // var property, and an in-line initializer.

    // Because these are lazy, the variables will call their in-line initializer
    // once they are ready to be added to the view hierarchy. Ideally, I would
    // like these to be lazy let so that you wont accidentally change them
    // once they are on-screen, but as of Swift 3 it is not supported.

    // We could just do let, but with a let, it won't let you wire up selectors
    // to self because self is not ready at initialization.
    lazy var titleLabel: UILabel = {

        // Initialize our new label with the default initializer
        let label = UILabel()

        // Always disable this, otherwise you will get layout errors
        // in the debug log. I am not even sure why this defaults to
        // "true" anymore as you will never need it.
        label.translatesAutoresizingMaskIntoConstraints = false

        // We can set fonts
        label.font = UIFont(name: "Menlo", size: 14)

        // Set some text color (note, we are not going for design awards here)
        label.textColor = .white

        // And of course, we can set the text
        label.text = "Awesome"

        // Center our text
        label.textAlignment = .center

        return label
    }()

    // Buttons are fun
    lazy var button: UIButton = {

        // Initialize
        let button = UIButton()

        // Disable this stupid "feature"
        button.translatesAutoresizingMaskIntoConstraints = false

        // Set a button title
        button.setTitle("Press Me", for: .normal)

        // Let's also wire up a button action
        button.addTarget(self,
                         action: #selector(OurAwesomeViewController.buttonTest),
                         for: .touchUpInside)

        return button
    }()

    // This is where you want to build your layout code. This is called by UIKit
    // when your view is being prepared to be put on the screen.
    override func loadView() {

        // Make sure you call super if you plan to use the default view
        // provided by UIKit, if you don't need it, make sure you set
        // self.view to be something
        super.loadView()

        // Customize the view
        view.backgroundColor = .blue

        // StackViews will make your life much easier. The will automatically
        // manage the layout of their owned views and expose some properties
        // to tweak that layout without manually managing potentially dozens
        // of constraints. StackViews can also be nested and given margins, this
        // can allow for quite a bit of flexibiliy AND ease. IMHO, this is much
        // better than manually building all of your constraints.
        let verticalLayout = UIStackView(arrangedSubviews: [titleLabel, button])

        // again, we never need this
        verticalLayout.translatesAutoresizingMaskIntoConstraints = false

        // Make it vertical, and tweak the distribution and alignment
        // feel free to play with these to get a feel for how this works.
        verticalLayout.axis = .vertical
        verticalLayout.alignment = .fill
        verticalLayout.distribution = .fill

        // If you want to have some margins on your StackView, you can enable it like this.
        verticalLayout.isLayoutMarginsRelativeArrangement = true
        verticalLayout.layoutMargins = UIEdgeInsets(top: 20, left: 20, bottom: 20, right: 20)

        // Lets create some constraints to keep our StackView layout in check.
        // This is essentially boilerplate code and you might want to create
        // a micro library to wrap up these common tasks. I will show mine in
        // another post later.
        let topConstraint = NSLayoutConstraint(item: verticalLayout,
                                               attribute: .top,
                                               relatedBy: .equal,
                                               toItem: view,
                                               attribute: .top,
                                               multiplier: 1,
                                               constant: 0)

        let bottomConstraint = NSLayoutConstraint(item: verticalLayout,
                                                  attribute: .bottom,
                                                  relatedBy: .equal,
                                                  toItem: view,
                                                  attribute: .bottom,
                                                  multiplier: 1,
                                                  constant: 0)

        let leftConstraint = NSLayoutConstraint(item: verticalLayout,
                                                attribute: .left,
                                                relatedBy: .equal,
                                                toItem: view,
                                                attribute: .left,
                                                multiplier: 1,
                                                constant: 0)

        let rightConstraint = NSLayoutConstraint(item: verticalLayout,
                                                 attribute: .right,
                                                 relatedBy: .equal,
                                                 toItem: view,
                                                 attribute: .right,
                                                 multiplier: 1,
                                                 constant: 0)

        // Now add our view...
        view.addSubview(verticalLayout)

        // And our constraints.
        view.addConstraints([topConstraint, bottomConstraint, leftConstraint, rightConstraint])
    }

    // Here is our test function to be called when our button is tapped.
    func buttonTest(sender: UIButton) {
        // Nothing fancy here, we will just change the background color.
        view.backgroundColor = .red
    }

}

// Fire up our awesome view controller in a playground.
PlaygroundPage.current.liveView = OurAwesomeViewController()
PlaygroundPage.current.needsIndefiniteExecution = true

// Layout in-code might look a bit daunting, but it allows you to become more familiar with
// the UI elements, their placement, and their properties. It improves change tracking in git
// and personally, I find this much easier to reason as opposed to the black magic of
// Interface Builder.

// BONUS CONTENT!!!

// You might want to know how to use this in an actual Xcode Project, rather than Playgrounds.

// First, in your project file, you might have a "Main Interface" configured, this is normally
// your first storyboard to load. Just open your project file and clear it out.

// Next

// This should be similar to your default AppDelegate. However, the only lines you need to
// change are in the applicationDidFinishLaunchingWithOptions function.
class AppDelegate: UIResponder, UIApplicationDelegate {

    var window: UIWindow?

    func application(_ application: UIApplication,
                     willFinishLaunchingWithOptions launchOptions: [UIApplicationLaunchOptionsKey : Any]? = nil) -> Bool {

        // Let's create a new window. Every app needs one to start.
        // We will set its frame to be the same size of the screen.
        window = UIWindow(frame: UIScreen.main.bounds)

        // Set the window's rootViewController to be the
        // ViewController you want to start with.
        window?.rootViewController = OurAwesomeViewController()

        // This will push it on to the screen.
        window?.makeKeyAndVisible()

        // Unless you have some major failure during this function, you should
        // return true here to let your application know it's ready to go.
        return true
    }
}

// And that's it for my first post, let me know via twitter (@WestonHanners) if you like this
// format and want to see more.

// Keep an eye out for my next post where we will write a few extensions to make the code
// above much easier to manage and read.
```

[Download This Playground][1]

[1]: /downloads/1-Layout.zip