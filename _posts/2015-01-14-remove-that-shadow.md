---
title: Remove that shadow!
date: 2015-01-14
layout: post
---

UIKit can be so frustrating sometimes. I was trying to remove a shadow
from UINavigationBar, and it turns out there is a property for doing this...

```
navigationBar.shadow = &lt;something&gt;
```

Perfect! or not... Apparently, it only works if
you have a custom image as your bar background

> The default value is nil, which corresponds to the
> default shadow image. When non-nil, this property
> represents a custom shadow image to show instead of the default. For a
> custom shadow image to be shown, a custom background image must also
> be set with
> the setBackgroundImage:forBarMetrics: method. If the
> default background image is used, then the default shadow image will
> be used regardless of the value of this property.

So, I cannot use a solid colored background without a shadow... after
looking around online, I found bunch of extensions on UIImage that
returns an image of a given size and color, but I felt that custom
drawing was a little overkill here. My solution is as follows:

```
extension UINavigationBar {
    
    func removeShadow() {
        if let view = removeShadowFromView(self) {
            view.hidden = true
        }
    }
    
    func removeShadowFromView(view: UIView) -> UIImageView? {
        if (view.isKindOfClass(UIImageView) && view.bounds.size.height <= 1) {
            return view as? UIImageView
        }
        for subView in view.subviews {
            if let imageView = removeShadowFromView(subView as UIView) {
                return imageView
            }
        }
        return nil
    }   
}
```

This way, I simply call

```
navigationController?.navigationBar.removeShadow()
```

![No Shadow][1]

and all is right with the world. Feel free to use this extension in your
own work, it's nothing particularly genius, but it sure helps me out.
This is based on some Objective-C code I found [here][2]

**Update for iOS 10:** I changed the above code so it "hides" the shadow, rather than
removing it. This is confirmed working on both iOS 9 and 10. The
removeFromSuperview() method doesn't work on iOS 10.

[1]: /images/noshadow.png
[2]: http://stackoverflow.com/a/19227158/713940