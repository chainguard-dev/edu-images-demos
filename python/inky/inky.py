'''import climage module to display images on terminal'''
import climage


def main():
    '''Take in PNG and output as ANSI to temrinal'''
    output = climage.convert('inky.png', is_unicode=True)
    print(output)

if __name__ == "__main__":
    main()
