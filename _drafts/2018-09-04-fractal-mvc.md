---
title: Fractal MVC - A Flexible iOS Architecture
date: 2018-09-04
layout: post
---

I started learning iOS development back when 2009 (when iPhone OS 3 came out). I quickly found out that most iOS an Mac applications were built with an architecture called Model-View-Controller, or MVC. 

My first attempts at implementing this pattern were laughable. I began by looking at a storyboard and saying “oh, I see there are views, and a class called UIViewController, that must mean those are the V and C that the architecture was talking about”. So I did what most other newbie iOS developers did at the time, I made a model. My first model was a giant singleton class that stored all of my data. 

IT WAS A MESS.

My “View Controllers” didn’t fair much better. I was animating views, processing business logic and code was getting duplicated all over the place. I had discovered the Massive-View-Controller pattern.

Today the programming blog community is flooded with attempts to replace MVC. MVVM, VIPER, Model-View-Presenter. I get why people do this, very few good examples of MVC exist and most “tutorial sites” don’t really help the issue. I think MVC *can* work as advertised, but it just requires a bit of a different perspective.

## Enter Fractal MVC

Fractal MVC (a name I have coined just for this blog post) IS NOT A NEW ARCHITECTURE, it is simply a different way to think about traditional MVC that I believe will actually make it quite a bit easier to understand and implement.

Google defines a Fractal as “a curve or geometric figure, each part of which has the same statistical character as the whole”. This is a great idea when applied to application architecture. By the way, if you wish to know more about fractals, go check out YouTube, there are a lot of excellent videos on the subject.

## Don’t think of scenes as views

I think View is misunderstood. Looking at the Wikipedia article for MVC, They don’t specify that view means buttons, labels and images, it says “A view can be any output representation of information”. I think this is a very important distinction, and understanding this is key in understanding Fractal MVC.

Let’s look at a common class used in iOS, UITextField. This class is essentially a micro MVC. The View is the CALayer that renders to the screen the Model is the backing String object, and the View Controller is the UIControl class that stitches it together. 

Looking even deeper, you can see that the string itself is a nano MVC, with the bits of data in memory being the model, the string rendering being done when you print it out and the View Controller is the String class method that handle converting the bits to Unicode data to be rendered when you print it out.

<Insert graphic showing MVC within MVC>

When you realize this, I think it simplifies MVC and actually shows that it can be quite elegant. You don’t just implement your architecture at the scene level you implement it fractally, from the scene all the way down to the individual components that make up your scene. You can even implement it in your network layer, with the server being your Model, your business logic service classes being the view and the actual network code being your view controller.

I think this is big.

## How do I go about implementing an MVC architecture “fractally”

Start by looking at your application screens. Take note of similar pieces of UI and similar data groupings. If you do this, most of the time, the individual mini MVC’s will start to become visible.

Don’t build your applications interface directly in Interface Builder, but instead extract out the components you identified earlier and build those instead. Figure out what might other pieces of your app be interested in giving to your component as an input, and what your component might want to give as an output.
