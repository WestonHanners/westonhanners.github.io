#!/usr/bin/env ruby

module Jekyll
    Jekyll::Hooks.register :posts, :post_render do |post|
        print(post)
        post.content.gsub("(?=<p><a href=\"https:\/\/www\.youtube\.com\/watch\?v=).*(?:<\/p>)") do |match|
            alt = match.match("(?<=\">).+(?=<\/a>)")
            videoID = match.match("(?<=\?v=)(.*)(?=\">)")
            return "<p><a href=\"https://www.youtube.com/watch?v=#{videoID}\"><img src=\"http://img.youtube.com/vi/#{videoID}/0.jpg\" alt=\"#{alt}\" /></a></p>"
        end
    end
end