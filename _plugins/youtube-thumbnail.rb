#!/usr/bin/env ruby

module Jekyll
    Jekyll::Hooks.register :posts, :post_render do |post|
        print(post)
    end
end