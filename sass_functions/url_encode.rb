require 'sass'
require 'cgi'

module Sass::Script::Functions
    def url_encode(string)
        assert_type string, :String
        Sass::Script::String.new(URI.escape(string.value))
    end
    declare :url_encode, :args => [:string]
end