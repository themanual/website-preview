require 'sass'
require 'base64'

module Sass::Script::Functions
    def base64(string)
        assert_type string, :String
        Sass::Script::String.new(Base64.encode64(string.value))
    end
    declare :base64, :args => [:string]
end