#!/bin/bash

#collect all id
id=$(aws ecr describe-images --output text --repository-name admin-app --query 'imageDetails[].imageTags[]')
for i in $id
do
	#collect date
	date=$(aws ecr describe-images --output text --repository-name admin-app --image-ids imageTag=$i --query 'imageDetails[].imagePushedAt')
	hdate=$(date -d @$date +'%s')
	range=$(date --date "30 days ago" +'%s')
	if [ "$hdate" -lt "$range" ]
	then
        echo $i
	fi
done







