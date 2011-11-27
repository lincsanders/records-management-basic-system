//
//  CEGCoreDataHandler.m
//  Ceg
//
//  Created by Christian Rönningen on 2011-11-26.
//  Copyright (c) 2011 Paperton. All rights reserved.
//

#import "CEGCoreDataHandler.h"

static CEGCoreDataHandler* sharedInstance = nil;

@implementation CEGCoreDataHandler

+ (CEGCoreDataHandler*) sharedInstance
{
    if(sharedInstance == nil)
    {
        sharedInstance = [[self alloc] init];
    }
    
    return sharedInstance;
}

- (void) cleanType:(NSString*)aType
{
    NSFetchRequest* r = [NSFetchRequest fetchRequestWithEntityName:aType];
    NSSortDescriptor* sort = [NSSortDescriptor sortDescriptorWithKey:@"id" 
                                                           ascending:NO];
    [r setSortDescriptors:[NSArray arrayWithObject:sort]];
    NSFetchedResultsController* f = [[NSFetchedResultsController alloc] initWithFetchRequest:r 
                                                                        managedObjectContext:self.managedObjectContext 
                                                                          sectionNameKeyPath:nil 
                                                                                   cacheName:nil];
    NSError* error = nil;
    if([f performFetch:&error])
    {
        for(NSManagedObject* obj in [f fetchedObjects])
            [self.managedObjectContext deleteObject:obj];
    }
    else
    {
        NSLog(@"Error : %@",[error description]); 
    }
    [f release];
    [self.managedObjectContext save:nil];
}

- (void) importData:(NSDictionary*)importData
{
    NSString* entityName = [importData valueForKey:@"Type"];
    NSArray* data = [importData valueForKey:@"data"];
    for(NSDictionary* dic in data)
    {
        NSManagedObject* newApp = [NSEntityDescription insertNewObjectForEntityForName:entityName 
                                                                inManagedObjectContext:self.managedObjectContext];
        for(NSString* key in [dic allKeys])
        {
            @try {
                [newApp setValue:[dic valueForKey:key] forKeyPath:key];
            }
            @catch (NSException *exception) {
                NSLog(@"import exception %@",[exception reason]);
                NSLog(@"Failed on apprentice : %@",dic);
            }
            @finally {
                
            }
            
        }
    }
    
    [self.managedObjectContext save:nil];
}

- (NSManagedObject*) createFormFromApprentice:(NSManagedObject*)aApprentice andVisit:(NSManagedObject*)aVisit
{
    NSManagedObject* form = [NSEntityDescription insertNewObjectForEntityForName:@"Form" 
                                                          inManagedObjectContext:self.managedObjectContext];

    [self.managedObjectContext save:nil];
    return form;
}

- (NSDictionary*) dictionaryFromForm:(NSManagedObject*)managedObj
{
    NSMutableDictionary* formDictionary = [NSMutableDictionary dictionary];
    
    NSString* key = @"host_employer_comments";
    [formDictionary setValue:[managedObj valueForKey:key] forKey:key];
    
    key = @"apprentice_comments";
    [formDictionary setValue:[managedObj valueForKey:key] forKey:key];
    
    key = @"consultant_comments";
    [formDictionary setValue:[managedObj valueForKey:key] forKey:key];
    
    key = @"work_attitude";
    [formDictionary setValue:[managedObj valueForKey:key] forKey:key];
    
    key = @"accepts_instruction";
    [formDictionary setValue:[managedObj valueForKey:key] forKey:key];
    
    key = @"skill_level";
    [formDictionary setValue:[managedObj valueForKey:key] forKey:key];
    
    key = @"motivation";
    [formDictionary setValue:[managedObj valueForKey:key] forKey:key];
    
    key = @"workmanship";
    [formDictionary setValue:[managedObj valueForKey:key] forKey:key];
    
    key = @"appearance";
    [formDictionary setValue:[managedObj valueForKey:key] forKey:key];
    
    key = @"improvement_required_in";
    [formDictionary setValue:[managedObj valueForKey:key] forKey:key];
    
    key = @"action_taken";
    [formDictionary setValue:[managedObj valueForKey:key] forKey:key];
    
    key = @"warning_issued";
    [formDictionary setValue:[managedObj valueForKey:key] forKey:key];
    
    key = @"profiling_book_updated";
    [formDictionary setValue:[managedObj valueForKey:key] forKey:key];
    
    key = @"profiling_book_difficulties";
    [formDictionary setValue:[managedObj valueForKey:key] forKey:key];
    
    key = @"profiling_book_able_to_get_signed";
    [formDictionary setValue:[managedObj valueForKey:key] forKey:key];
    
    key = @"annual_leave_booked";
    [formDictionary setValue:[managedObj valueForKey:key] forKey:key];
    
    key = @"rdo_booked";
    [formDictionary setValue:[managedObj valueForKey:key] forKey:key];
    
    key = @"any_leave_required";
    [formDictionary setValue:[managedObj valueForKey:key] forKey:key];
    
    key = @"changes_to";
    [formDictionary setValue:[managedObj valueForKey:key] forKey:key];
    
   /* key = @"app_signature";
    [formDictionary setValue:[managedObj valueForKey:key] forKey:key];
    
    key = @"emp_signature";
    [formDictionary setValue:[managedObj valueForKey:key] forKey:key];
    
    key = @"atc_signature";
    [formDictionary setValue:[managedObj valueForKey:key] forKey:key];
    */
    return formDictionary;
}

@synthesize fetchedResultsController = __fetchedResultsController;
@synthesize managedObjectContext = __managedObjectContext;

@end
