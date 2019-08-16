#!/usr/bin/env ruby
require 'fileutils'

module Jekyll
  Jekyll::Hooks.register :site, :post_write do |site|
    Dir.glob('_root/*.*') do |file|
      sourcePath = file
      outputPath = File.join(site.config['destination'], File.basename(file) )
      FileUtils.cp(sourcePath, outputPath)
    end
  end
end