//
//  CEGDataSource.m
//  Ceg
//
//  Created by Christian Rönningen on 2011-11-26.
//  Copyright (c) 2011 Paperton. All rights reserved.
//

#import "CEGDataSource.h"
#import "CEGCoreDataHandler.h"

#import "JSONKit.h"

#define FORM_URL @"http://lincoln-sandersons-imac.local/jr-site-visits/visitForm/addEdit"
#define VISIT_URL @"http://lincoln-sandersons-imac.local/jr-site-visits/visit/json"
#define APPRENTICE_URL @"http://lincoln-sandersons-imac.local/jr-site-visits/apprentice/json"
@interface CEGDataSource()

- (void) downloadVisitorData;
- (void) downloadApprenticeData;

@end

static CEGDataSource* sharedInstance = nil;

@implementation CEGDataSource

@dynamic apprenticeFetchedResultsController;

+ (CEGDataSource*) sharedInstance
{
    if(sharedInstance == nil)
    {
        sharedInstance = [[self alloc] init];
    }
    
    return sharedInstance;
}

- (id) init
{
    if((self=[super init]))
    {
        //dispatch_async(dispatch_get_global_queue(DISPATCH_QUEUE_PRIORITY_DEFAULT, 0), ^(void){
            // Download fresh Visit data
            [self downloadVisitorData];
        
            // Download Apprentice Data
            [self downloadApprenticeData];
        //});
    }
    return self;
}

- (BOOL) validateData:(NSDictionary*)data error:(NSError**)error
{
    if(data == nil)
    {
       // error = [[NSError alloc] initWithDomain:@"com.CEG.error.noData" code:101 userInfo:nil];
        return NO;
    }
    return YES;
}

- (void) exportDataOfType:(enum kDownloadType)type
{
   

    NSFetchRequest* r = [NSFetchRequest fetchRequestWithEntityName:@"Form"];
    NSSortDescriptor* sort = [NSSortDescriptor sortDescriptorWithKey:@"atc_signature" 
                                                           ascending:NO];
    [r setSortDescriptors:[NSArray arrayWithObject:sort]];
    NSFetchedResultsController* f = [[NSFetchedResultsController alloc] initWithFetchRequest:r 
                                                                        managedObjectContext:[CEGCoreDataHandler sharedInstance].managedObjectContext 
                                                                          sectionNameKeyPath:nil 
                                                                                   cacheName:nil];
    NSError* error = nil;
    if([f performFetch:&error])
    {
        NSLog(@"Fetched Forms : %d",[[f fetchedObjects] count]);
        for(NSManagedObject* form in [f fetchedObjects])
        {
            NSMutableURLRequest* req = [NSMutableURLRequest requestWithURL:[NSURL URLWithString:FORM_URL]];
            [req setHTTPMethod:@"POST"];
            
            NSDictionary* dic = [[CEGCoreDataHandler sharedInstance] dictionaryFromForm:form];
            NSMutableString *postString = [[NSMutableString alloc] init];
            NSArray *allKeys = [dic allKeys];
            for (int i = 0; i < [allKeys count]; i++) {
                NSString *key = [allKeys objectAtIndex:i];
                NSString *value = [dic objectForKey:key];
                [postString appendFormat:( (i == 0) ? @"%@=%@" : @"&%@=%@" ), key, value];
            }
            
           // [req setHTTPBody:[postString dataUsingEncoding:NSUTF8StringEncoding]];
            NSLog(@"postString %@",postString);
            NSLog(@".------------- ..- . -. .- .- .- .- .- . -. -. - .-");
 
            
            
            NSString *urlString = FORM_URL;
            NSMutableURLRequest* request= [[[NSMutableURLRequest alloc] init] autorelease];
            [request setURL:[NSURL URLWithString:urlString]];
            [request setHTTPMethod:@"POST"];
            NSString *boundaryZ = @"---------------------------1234567891";
            NSString *contentType = [NSString stringWithFormat:@"multipart/form-data; boundary=%@",boundaryZ];
            [request addValue:contentType forHTTPHeaderField: @"Content-Type"];
            
            
            NSMutableData *postbody = [NSMutableData data];
            [postbody appendData:[[NSString stringWithFormat:@"\r\n--%@\r\n",boundaryZ] dataUsingEncoding:NSUTF8StringEncoding]];
            
            [postbody appendData:[postString dataUsingEncoding:NSUTF8StringEncoding]];
            NSString *boundaryA = @"---------------------------1234567890";
            contentType = [NSString stringWithFormat:@"multipart/form-data; boundary=%@",boundaryA];
            [request addValue:contentType forHTTPHeaderField: @"Content-Type"];
            [postbody appendData:[[NSString stringWithFormat:@"\r\n--%@\r\n",boundaryA] dataUsingEncoding:NSUTF8StringEncoding]];
            [postbody appendData:[[NSString stringWithFormat:@"Content-Disposition: form-data; name=\"app_signature\"; filename=\"signature.png\"\r\n"] dataUsingEncoding:NSUTF8StringEncoding]];
            [postbody appendData:[[NSString stringWithString:@"Content-Type: application/octet-stream\r\n\r\n"] dataUsingEncoding:NSUTF8StringEncoding]];
            NSData* imgData = [form valueForKey:@"app_signature"];
            [postbody appendData:[NSData dataWithData:imgData]];
            
            contentType = [NSString stringWithFormat:@"multipart/form-data; boundary=%@",boundaryA];
            [request addValue:contentType forHTTPHeaderField: @"Content-Type"];
            [postbody appendData:[[NSString stringWithFormat:@"\r\n--%@\r\n",boundaryA] dataUsingEncoding:NSUTF8StringEncoding]];
            [postbody appendData:[[NSString stringWithFormat:@"Content-Disposition: form-data; name=\"atc_signature\"; filename=\"signature.png\"\r\n"] dataUsingEncoding:NSUTF8StringEncoding]];
            [postbody appendData:[[NSString stringWithString:@"Content-Type: application/octet-stream\r\n\r\n"] dataUsingEncoding:NSUTF8StringEncoding]];
            imgData = [form valueForKey:@"atc_signature"];
            [postbody appendData:[NSData dataWithData:imgData]];
            
            contentType = [NSString stringWithFormat:@"multipart/form-data; boundary=%@",boundaryA];
            [request addValue:contentType forHTTPHeaderField: @"Content-Type"];
            [postbody appendData:[[NSString stringWithFormat:@"\r\n--%@\r\n",boundaryA] dataUsingEncoding:NSUTF8StringEncoding]];
            [postbody appendData:[[NSString stringWithFormat:@"Content-Disposition: form-data; name=\"emp_signature\"; filename=\"signature.png\"\r\n"] dataUsingEncoding:NSUTF8StringEncoding]];
            [postbody appendData:[[NSString stringWithString:@"Content-Type: application/octet-stream\r\n\r\n"] dataUsingEncoding:NSUTF8StringEncoding]];
            imgData = [form valueForKey:@"emp_signature"];
            [postbody appendData:[NSData dataWithData:imgData]];
            
            [postbody appendData:[[NSString stringWithFormat:@"\r\n--%@--\r\n",boundaryA] dataUsingEncoding:NSUTF8StringEncoding]];
            [postbody appendData:[[NSString stringWithFormat:@"\r\n--%@--\r\n",boundaryZ] dataUsingEncoding:NSUTF8StringEncoding]];
            
            NSLog(@"postbody %@",[[[NSString alloc] initWithData:postbody encoding:NSUTF8StringEncoding] autorelease]);
            
            [request setHTTPBody:postbody];
            
            //NSData *returnData = [NSURLConnection sendSynchronousRequest:request returningResponse:nil error:nil];
            //returnString = [[NSString alloc] initWithData:returnData encoding:NSUTF8StringEncoding];

            NSURLConnection* con = [NSURLConnection connectionWithRequest:request delegate:self];
            [con start];
        }
    }
    else
    {
        NSLog(@"Error : %@",[error description]); 
    }
    [f release];   
}

- (void) connectionDidFinishLoading:(NSURLConnection *)connection
{
    NSString* response = [[NSString alloc] initWithData:_responseData encoding:NSUTF8StringEncoding];
    [_responseData release];
    
    NSDictionary* jsonObj = [response objectFromJSONString];
    if([[jsonObj valueForKey:@"code"] intValue] == 100)
        NSLog(@"WE DID IT %@",jsonObj);
}

- (void) connection:(NSURLConnection *)connection didReceiveData:(NSData *)data
{
    [_responseData appendData:data];
}

- (void) connection:(NSURLConnection *)connection didReceiveResponse:(NSURLResponse *)response
{
    _responseData = [[NSMutableData alloc] initWithLength:0];
}

- (void) connection:(NSURLConnection *)connection didFailWithError:(NSError *)error
{
    [_responseData release];
}

- (void) importData:(NSDictionary*)data ofType:(enum kDownloadType)type
{
    NSError* error = nil;
    if([self validateData:data error:&error])
    {
        if(type == kApprentice)
        {
            // clean old records
            [[CEGCoreDataHandler sharedInstance] cleanType:@"Apprentice"];
            [[CEGCoreDataHandler sharedInstance] importData:data];
            
            NSFetchRequest* r = [NSFetchRequest fetchRequestWithEntityName:@"Apprentice"];
            NSSortDescriptor* sort = [NSSortDescriptor sortDescriptorWithKey:@"apprentice_first_name" 
                                                                   ascending:NO];
            [r setSortDescriptors:[NSArray arrayWithObject:sort]];
            NSFetchedResultsController* f = [[NSFetchedResultsController alloc] initWithFetchRequest:r 
                                                                                managedObjectContext:[CEGCoreDataHandler sharedInstance].managedObjectContext 
                                                                                  sectionNameKeyPath:nil 
                                                                                           cacheName:nil];
            NSError* error = nil;
            if([f performFetch:&error])
            {
                NSLog(@"Fetched Apprentices : %d",[[f fetchedObjects] count]);
            }
            else
            {
                NSLog(@"Error : %@",[error description]); 
            }
            [f release];
            
        }
        else if(type == kVisitor)
        {
            // clean old records
           //[[CEGCoreDataHandler sharedInstance] cleanType:@"Form"];
            [self exportDataOfType:type];
            [[CEGCoreDataHandler sharedInstance] cleanType:@"Visit"];
            [[CEGCoreDataHandler sharedInstance] importData:data];
            
            NSFetchRequest* r = [NSFetchRequest fetchRequestWithEntityName:@"Visit"];
            NSSortDescriptor* sort = [NSSortDescriptor sortDescriptorWithKey:@"apprentice_first_name" 
                                                                   ascending:NO];
            [r setSortDescriptors:[NSArray arrayWithObject:sort]];
            NSFetchedResultsController* f = [[NSFetchedResultsController alloc] initWithFetchRequest:r 
                                                                                managedObjectContext:[CEGCoreDataHandler sharedInstance].managedObjectContext 
                                                                                  sectionNameKeyPath:nil 
                                                                                           cacheName:nil];
            NSError* error = nil;
            if([f performFetch:&error])
            {
                NSLog(@"Fetched Visits : %d",[[f fetchedObjects] count]);
            }
            else
            {
                NSLog(@"Error : %@",[error description]); 
            }
            [f release];
        }   
        
        
    }
    else
    {
        // Print error
        
        // retry?
    }
}

- (void) downloadVisitorData
{
    NSLog(@"STARTED downloadVisitorData");
    NSURL* url = [NSURL URLWithString:VISIT_URL];
    NSString* visitString = [NSString stringWithContentsOfURL:url encoding:NSUTF8StringEncoding error:nil];
    if(visitString)
    {
        NSObject* json = [visitString objectFromJSONString]; 
        NSArray* objects = [NSArray arrayWithObjects:@"Visit",json, nil];
        NSArray* keys = [NSArray arrayWithObjects:@"Type",@"data", nil];
        NSDictionary* newVisit = [NSDictionary dictionaryWithObjects:objects 
                                                             forKeys:keys];
        
        
        //NSLog(@"Apprentices : %@",visitString);
        
        [self importData:newVisit 
                  ofType:kVisitor];
    }
    NSLog(@"DONE downloadVisitorData");
}

- (void) downloadApprenticeData
{
    NSLog(@"STARTED downloadApprenticeData");
    NSURL* url = [NSURL URLWithString:APPRENTICE_URL];
    NSString* apprenticeData = [NSString stringWithContentsOfURL:url encoding:NSUTF8StringEncoding error:nil];
    if(apprenticeData)
    {
        NSObject* json = [apprenticeData objectFromJSONString]; 
        NSArray* objects = [NSArray arrayWithObjects:@"Apprentice",json, nil];
        NSArray* keys = [NSArray arrayWithObjects:@"Type",@"data", nil];
        NSDictionary* newApprentices = [NSDictionary dictionaryWithObjects:objects 
                                                                   forKeys:keys];
        
    
        //NSLog(@"Apprentices : %@",newApprentices);
   
        [self importData:newApprentices 
                  ofType:kApprentice];
    }
    NSLog(@"DONE downloadApprenticeData");
}

- (NSFetchedResultsController*) visitorFetchedResultsControllerForTrainingId:(NSString*)tId
{
    NSFetchRequest* request = [NSFetchRequest fetchRequestWithEntityName:@"Visit"];
    NSSortDescriptor* sort = [NSSortDescriptor sortDescriptorWithKey:@"training_id" 
                                                           ascending:NO];
    [request setSortDescriptors:[NSArray arrayWithObject:sort]];
    NSPredicate* pred = [NSPredicate predicateWithFormat:@"training_id == %@",tId];
    [request setPredicate:pred];
    
    NSFetchedResultsController* _visitorFetchedResultsController = [[NSFetchedResultsController alloc] initWithFetchRequest:request 
                                                                                                       managedObjectContext:[CEGCoreDataHandler sharedInstance].managedObjectContext 
                                                                                                         sectionNameKeyPath:nil 
                                                                                                                  cacheName:nil];
    
    
    NSError* fetchError = nil;
    if(! [_visitorFetchedResultsController performFetch:&fetchError])
    {
        NSLog(@"Error fetching visitor : %@",[fetchError description]);
    }
    
    return [_visitorFetchedResultsController autorelease];
}

- (NSFetchedResultsController*) apprenticeFetchedResultsController
{
    if(_apprenticeFetchedResultsController)
        return _apprenticeFetchedResultsController;
    
    NSFetchRequest* request = [NSFetchRequest fetchRequestWithEntityName:@"Apprentice"];
    NSSortDescriptor* sort = [NSSortDescriptor sortDescriptorWithKey:@"apprentice_surname" 
                                                           ascending:NO];
    [request setSortDescriptors:[NSArray arrayWithObject:sort]];
    _apprenticeFetchedResultsController = [[NSFetchedResultsController alloc] initWithFetchRequest:request 
                                                                           managedObjectContext:[CEGCoreDataHandler sharedInstance].managedObjectContext 
                                                                             sectionNameKeyPath:nil 
                                                                                      cacheName:nil];
    
    
    NSError* fetchError = nil;
    if([_apprenticeFetchedResultsController performFetch:&fetchError])
    {
        
    }
    
    return _apprenticeFetchedResultsController;
}

- (NSManagedObject*) createFormFromApprentice:(NSManagedObject*)aApprentice andVisit:(NSManagedObject*)aVisit
{
    return [[CEGCoreDataHandler sharedInstance] createFormFromApprentice:aApprentice 
                                                                andVisit:aVisit];
}

- (void) dealloc
{
    self.apprenticeFetchedResultsController = nil;
    
    [super dealloc];
}

@end
