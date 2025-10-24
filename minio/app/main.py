#!/usr/bin/env python3
"""
MinIO Sample Application
Demonstrates basic MinIO operations: creating buckets, uploading, downloading, and listing objects
"""

import os
import sys
import time
from io import BytesIO
from minio import Minio
from minio.error import S3Error

def get_minio_client():
    """Create and return a MinIO client instance"""
    endpoint = os.getenv("MINIO_ENDPOINT", "localhost:9000")
    access_key = os.getenv("MINIO_ACCESS_KEY", "minioadmin")
    secret_key = os.getenv("MINIO_SECRET_KEY", "minioadmin123")
    secure = os.getenv("MINIO_SECURE", "false").lower() == "true"

    return Minio(
        endpoint,
        access_key=access_key,
        secret_key=secret_key,
        secure=secure
    )

def wait_for_minio(client, max_retries=30, delay=2):
    """Wait for MinIO server to be ready"""
    print("Waiting for MinIO server to be ready...")
    for i in range(max_retries):
        try:
            # Try to list buckets to check if server is ready
            client.list_buckets()
            print("MinIO server is ready!")
            return True
        except Exception as e:
            if i < max_retries - 1:
                print(f"Attempt {i+1}/{max_retries}: Server not ready yet, waiting {delay}s...")
                time.sleep(delay)
            else:
                print(f"Failed to connect to MinIO after {max_retries} attempts")
                return False
    return False

def create_bucket(client, bucket_name):
    """Create a bucket if it doesn't exist"""
    try:
        if not client.bucket_exists(bucket_name):
            client.make_bucket(bucket_name)
            print(f"✓ Created bucket: {bucket_name}")
        else:
            print(f"✓ Bucket already exists: {bucket_name}")
        return True
    except S3Error as e:
        print(f"✗ Error creating bucket: {e}")
        return False

def upload_object(client, bucket_name, object_name, data):
    """Upload data to MinIO"""
    try:
        # Convert string to bytes if needed
        if isinstance(data, str):
            data = data.encode('utf-8')

        data_stream = BytesIO(data)
        client.put_object(
            bucket_name,
            object_name,
            data_stream,
            length=len(data)
        )
        print(f"✓ Uploaded object: {object_name} to bucket: {bucket_name}")
        return True
    except S3Error as e:
        print(f"✗ Error uploading object: {e}")
        return False

def download_object(client, bucket_name, object_name):
    """Download and return object data from MinIO"""
    try:
        response = client.get_object(bucket_name, object_name)
        data = response.read()
        response.close()
        response.release_conn()
        print(f"✓ Downloaded object: {object_name} from bucket: {bucket_name}")
        return data
    except S3Error as e:
        print(f"✗ Error downloading object: {e}")
        return None

def list_objects(client, bucket_name):
    """List all objects in a bucket"""
    try:
        objects = client.list_objects(bucket_name)
        object_list = []
        for obj in objects:
            object_list.append(obj.object_name)
            print(f"  - {obj.object_name} (size: {obj.size} bytes)")
        return object_list
    except S3Error as e:
        print(f"✗ Error listing objects: {e}")
        return []

def list_buckets(client):
    """List all buckets"""
    try:
        buckets = client.list_buckets()
        bucket_list = []
        for bucket in buckets:
            bucket_list.append(bucket.name)
            print(f"  - {bucket.name} (created: {bucket.creation_date})")
        return bucket_list
    except S3Error as e:
        print(f"✗ Error listing buckets: {e}")
        return []

def delete_object(client, bucket_name, object_name):
    """Delete an object from MinIO"""
    try:
        client.remove_object(bucket_name, object_name)
        print(f"✓ Deleted object: {object_name} from bucket: {bucket_name}")
        return True
    except S3Error as e:
        print(f"✗ Error deleting object: {e}")
        return False

def main():
    """Main function demonstrating MinIO operations"""
    print("=" * 60)
    print("MinIO Sample Application with Chainguard Container")
    print("=" * 60)
    print()

    # Create MinIO client
    client = get_minio_client()

    # Wait for MinIO to be ready
    if not wait_for_minio(client):
        print("Could not connect to MinIO server. Exiting.")
        sys.exit(1)

    print()

    # Bucket name for demo
    bucket_name = "demo-bucket"

    # 1. Create a bucket
    print(f"1. Creating bucket '{bucket_name}'...")
    create_bucket(client, bucket_name)
    print()

    # 2. List all buckets
    print("2. Listing all buckets...")
    list_buckets(client)
    print()

    # 3. Upload some sample objects
    print("3. Uploading sample objects...")
    upload_object(client, bucket_name, "hello.txt", "Hello from MinIO!")
    upload_object(client, bucket_name, "data.json", '{"message": "Sample JSON data", "timestamp": "2024-10-24"}')
    upload_object(client, bucket_name, "info.txt", "This is a demo of MinIO with Chainguard containers")
    print()

    # 4. List objects in the bucket
    print(f"4. Listing objects in bucket '{bucket_name}'...")
    list_objects(client, bucket_name)
    print()

    # 5. Download and display an object
    print("5. Downloading and displaying 'hello.txt'...")
    data = download_object(client, bucket_name, "hello.txt")
    if data:
        print(f"   Content: {data.decode('utf-8')}")
    print()

    # 6. Delete an object
    print("6. Deleting 'info.txt'...")
    delete_object(client, bucket_name, "info.txt")
    print()

    # 7. List objects again to confirm deletion
    print(f"7. Listing objects in bucket '{bucket_name}' after deletion...")
    list_objects(client, bucket_name)
    print()

    print("=" * 60)
    print("Demo completed successfully!")
    print("=" * 60)

if __name__ == "__main__":
    main()
