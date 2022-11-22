---
title: Application Inclusivity Checklist
layout: post
permalink: a11y
tags:
---

**Note that this is more of a reminder of things to check. Good accessibility is much more than just filling out a checklist.** 

> ⭐ **Golden Rule:** If something might be difficult for someone, it doesn’t mean you CAN’T do it, you just need to make sure there is an alternative way to access the same content.

> 🥈 **Silver Rule:** Respect all user preferences regarding accessibility.

# Structure

- Group related text elements and add connecting verbiage to improve flow.
- Make sure to annotate header elements to allow users to navigate faster.
- Reduce accessibility element pollution with explicit pagination or adding new pages.

> 💡 Have you ever called an automated phone system where they asked you to press a number for what you want… Imagine if every button on your application was like that? Would you like to wait through potentially hundreds of options?

- Validate that all buttons can be reached using Voiceover and Switch Control.
- On iOS applications, ensure screens utilize the [Dismiss Gesture][1]  (Z with 2 fingers).
- Ensure Screen Reader and Switch Control can only access elements on-screen, not obscured.
- Do not lock application orientation. All applications should be functional in portrait or landscape.
- Avoid frequent layout changes throughout your app. Users can be more productive if common functionality is in the expected location.
- The screen reader should start at the top right and move through the app towards the bottom in an expected manner.

> 💡 Users without the ability to control their hands will commonly have their phone or iPad attached to their wheelchairs. Forcing them to get someone to rotate their device to use it is a bad experience

# Text

- Validate that acronyms and initialisms are pronounced as expected.
- Expand abbreviations in accessibility labels. (ie, secs expanded to second)

> 💡 Some common text practices are highly visual. Arrows (→), abbreviations (lbs), emoticons (:D), and kaomoji (◕‿◕) can be problematic without some specific work.

- Number formats should automatically be pronounced correctly as long as it is well-formed, but it’s still worth validating.
- All text should respect user text size and weight preferences.

> 💡 Frequently test with different text sizes and weights to catch issues early.

- Feel free to use accessibility labels to provide additional app state context for non-sighted users.
- Users should not have to scroll horizontally to read text blocks.

> 💡 Make sure you test all of your text to make sure it sounds great with many common screen readers (Talkback or Voiceover)

# Interactions

- Add Hints for complicated interactions or controls.
- Confirm accessibility traits for all elements.
- Use announcements to convey information that changes for a user mid-interaction.
- Ensure that “toggle style” controls include their state in the spoken description.
- Text fields will typically have both a label and value. Make sure to use both and make sure the label is not redundant.
- Toasts should generally be avoided, but if they must be added, use announcements to reposition the focus.
- Do not require motion gestures. Shake and turn upside down gestures might be impossible for some users.

> 💡 Turn on your screen reader and try using your app with your eyes closed. You will learn a lot about where you can improve very quickly.

# Images

- All images should have a text description unless they are pure design elements with no information.

> 💡 Don’t forget to test Back Buttons, Chevrons, Icons, and Logos.

- The above also goes for images of text. The text will need to be available to screen readers.
- All videos should have subtitles.
- Dark Mode is not only an aesthetic feature but valuable for certain visual disabilities.

# Color

- The contrast ratio should be 4.5:1. [WCAG 2.1 Reference][2]
- Color contrast can be slightly lower if using bold or large font sizes.
- Color should not be used as the ONLY way of conveying information. (use symbols or labels to clarify).
- Some colors can confuse and distract people with certain cognitive disabilities, be aware of your color usage.

> 💡 Color blindness might not be the only reason to differentiate without color. Some cultures might also place different significance on certain colors. check out [this article][3] for more information.

# Common User Preferences

The application should function while following user preferences. 

This list is not exhaustive. Please check your platform’s documentation for details on supported accessibility preferences and features.

- Text Size
- Suppress Animation
- Suppress Transparency
- Bold Text
- Gray Scale
- Autoplay Videos
- Differentiate without Color
- Button Shapes
- Increase Contrast

[1]: https://support.apple.com/guide/iphone/learn-voiceover-gestures-iph3e2e2281/ios
[2]: https://www.w3.org/TR/WCAG21/#contrast-minimum
[3]: https://eriksen.com/marketing/color_culture/