#!/usr/bin/env ruby

require 'rainbow'
Rainbow.enabled = true

class Linky

    def says(message = "Hello World")
        colors = [:purple, :magenta]
        words = message.split(" ")

        print "\n ".ljust(40, " ")
        words.each do |n|
            print Rainbow(n).color(colors.sample) + " "
        end

        print "\n"
        puts File.readlines('linky.txt')
    end
end

if __FILE__ == $0
    linky = Linky.new
    inputArray = ARGV
    message = inputArray.length > 0 ? inputArray.join(' ') : "Hello Wolfi"
    linky.says(message)
end

