#!/usr/bin/env ruby

module Jekyll
    Jekyll::Hooks.register :posts, :post_render do |post|
        post.content.gsub!(/(?=<p><a href=\"https:\/\/www\.youtube\.com\/watch\?v=).*(?:<\/p>)/) { |match|
            print(match)

            altText = match.match(/(?<=\">).+(?=<\/a>)/)
            videoID = match.match(/(?<=\?v=)(.*)(?=\">)/)

            output = "<p><a href=\"https://www.youtube.com/watch?v=#{videoID}\"><img src=\"http://img.youtube.com/vi/#{videoID}/0.jpg\" alt=\"#{altText}\" /></a></p>"

            print(output)
            
            output
        }
    end
end