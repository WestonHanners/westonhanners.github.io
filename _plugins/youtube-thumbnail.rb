#!/usr/bin/env ruby

module Jekyll
    Jekyll::Hooks.register :posts, :post_render do |post|
        post.content.gsub!(/(?=<p><a href=\"https:\/\/www\.youtube\.com\/watch\?v=).*(?:<\/p>)/) do |match|
            print(post)

            altText = match.match(/(?<=\">).+(?=<\/a>)/)
            videoID = match.match(/(?<=\?v=)(.*)(?=\">)/)

            "<p><a href=\"https://www.youtube.com/watch?v=#{videoID}\"><img src=\"http://img.youtube.com/vi/#{videoID}/0.jpg\" alt=\"#{altText}\" /></a></p>"
        end
    end
end