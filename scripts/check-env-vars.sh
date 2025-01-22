#!/bin/bash

# Compare variables in .env and .env.example
missing_vars=$(comm -23 <(grep -o '^[A-Z_][A-Z0-9_]*' .env | sort) <(grep -o '^[A-Z_][A-Z0-9_]*' .env.example | sort))

if [ -n "$missing_vars" ]; then
    echo "❌ Error: The following variables are present in .env but missing in .env.example:"
    echo "$missing_vars"
    exit 1
fi

echo "✅ All variables in .env are present in .env.example"
exit 0
