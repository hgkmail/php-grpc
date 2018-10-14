package main

import (
	test "../proto"
	"context"
	rgrpc "github.com/spiral/grpc"
	"github.com/spiral/roadrunner"
	"google.golang.org/grpc"
	"google.golang.org/grpc/encoding"
	"net"
	"time"
)

type PingServer struct {
}

func (p *PingServer) Ping(ctx context.Context, msg *test.Message) (*test.Message, error) {
	//logrus.Print("got message: ", msg.Msg)
	return msg, nil
}

func main() {
	server := grpc.NewServer(grpc.CustomCodec(&rgrpc.CodecWrapper{
		Base: encoding.GetCodec("proto"),
	}))

	//Adding unit
	test.RegisterPingServer(server, &PingServer{})

	// dynamically generated server
	srv := &rgrpc.Server{
		Name:     "test.PHP",
		Metadata: "test.proto",
	}

	r := roadrunner.NewServer(&roadrunner.ServerConfig{
		Command: "php client.php",
		Relay:   "pipes",
		Pool: &roadrunner.Config{
			NumWorkers: 8,
			//MaxJobs:         1,
			AllocateTimeout: time.Second,
			DestroyTimeout:  time.Second,
		},
	})

	server.RegisterService(srv.ServiceDesc(r), srv)

	//Open connection
	listener, err := net.Listen("tcp", "localhost:8000")
	if err != nil {
		panic(err)
	}

	err = r.Start()
	if err != nil {
		panic(err)
	}

	defer r.Stop()

	server.Serve(listener)
}