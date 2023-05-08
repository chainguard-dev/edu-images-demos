#!/usr/bin/env ruby

require 'rainbow'
Rainbow.enabled = true

class Inky

    def says(message = "Hello World")
        colors = [:purple, :magenta]
        words = message.split(" ")

        print "\n ".ljust(40, " ")
        words.each do |n|
            print Rainbow(n).color(colors.sample) + " "
        end

        print "\n"
        puts File.readlines('inky.txt')
    end
end

if __FILE__ == $0
    inky = Inky.new
    inputArray = ARGV
    message = inputArray.length > 0 ? inputArray.join(' ') : "Hello Wolfi"
    inky.says(message)
end

