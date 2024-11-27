package main

import (
	"fmt"

	"github.com/google/go-containerregistry/pkg/name"
	"github.com/google/go-containerregistry/pkg/v1/remote"
)

func main() {
	image := "cgr.dev/chainguard/go"
	ref, err := name.ParseReference(image)
	if err != nil {
		panic(err)
	}
	desc, err := remote.Get(ref)
	if err != nil {
		panic(err)
	}
	fmt.Printf("The digest of %s is %s\n", image, desc.Digest)
}

