#!/usr/bin/env ruby

class OctoFact
    attr_accessor :source

    def initialize(source = "facts.txt")
        @source = source
    end

    def random_line
        puts File.readlines(@source).sample
    end
end

if __FILE__ == $0
    fact = OctoFact.new
    fact.random_line
end
