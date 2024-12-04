package main

import (
    "fmt"
    "flag"
    "github.com/google/go-containerregistry/pkg/name"
    "github.com/google/go-containerregistry/pkg/v1/remote"
)

func main() {
    flag.Parse()
    image := "go"
    args := flag.Args()
    if len(args) >= 1 && args[0] != "" {
        image = args[0]
    }

    ref, err := name.ParseReference("cgr.dev/chainguard/" + image)
    if err != nil {
        panic(err)
    }

    desc, err := remote.Get(ref)
    if err != nil {
        panic(err)
    }

    fmt.Printf("The latest digest of the %s Chainguard Image is %s\n", image, desc.Digest)
}
