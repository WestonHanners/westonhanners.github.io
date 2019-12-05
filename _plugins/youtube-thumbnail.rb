#!/usr/bin/env ruby

module Jekyll
    Jekyll::Hooks.register :posts, :post_render do |post|
        post.gsub("<p><a href=\"https:\/\/www\.youtube\.com\/watch\?v=\w+\">\w+<\/a><\/p>") do |match|
            alt = match.match("(?<=alt=\")(.*)(?=\")\")
            videoID = match.match("(?<=\?v=)(.*)(?=\">)")
            return "<p><a href=\"https://www.youtube.com/watch?v=#{videoID}\"><img src=\"http://img.youtube.com/vi/#{videoID}/0.jpg\" alt=\"#{alt}\" /></a></p>"
        end
    end
end