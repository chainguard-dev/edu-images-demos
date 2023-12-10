'''import climage module to display images on terminal'''
from climage import convert, color_to_flags, color_types


def main():
    '''Take in PNG and output as ANSI to terminal'''
    output = convert('inky.png', is_unicode=True, **color_to_flags(color_types.truecolor))
    print(output)

if __name__ == "__main__":
    main()
