#include <stdio.h>
int main()
{
    int starting_point, ending_point, arr[20], length, j;
    printf("Enter the length of array:-\n");
    scanf("%d ",&length);
    printf("Enter the starting point:-\n");
    scanf("%d ",&starting_point);
    printf("Enter the ending point:-\n");
	scanf("%d ",&ending_point);
	printf("Enter array element:-");
    for(j=0; j<length; j++)
    {
        scanf("%d",&arr[j]);
    }
    for(j=0;j<length;j++)
    {
        if(arr[j]>=starting_point && arr[j]<ending_point)
        {
            printf("%d ",j);
        }
    }
    return 0;
}
