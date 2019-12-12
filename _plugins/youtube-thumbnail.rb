#!/usr/bin/env ruby

module Jekyll
    Jekyll::Hooks.register :posts, :post_render do |post|

        newOutput = post.output.gsub(/(?=<p><a href=\"https:\/\/www\.youtube\.com\/watch\?v=).*(?:<\/p>)/) { |match|

            altText = match.match(/(?<=\">).+(?=<\/a>)/)
            videoID = match.match(/(?<=\?v=)(.*)(?=\">)/)

            "<p class=\"youtube-video\"><a href=\"https://www.youtube.com/watch?v=#{videoID}\"><img src=\"https://img.youtube.com/vi/#{videoID}/0.jpg\" alt=\"#{altText}\/\" /></a></p>"            
        }

        post.output = newOutput
    end
end